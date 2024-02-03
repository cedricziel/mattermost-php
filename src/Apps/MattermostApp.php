<?php

namespace CedricZiel\MattermostPhp\Apps;

use CedricZiel\MattermostPhp\Apps\Bindings\LocationBinding;
use CedricZiel\MattermostPhp\Apps\Bindings\TopLevelBinding;
use CedricZiel\MattermostPhp\Apps\Events\OnBindingsRequestEvent;
use CedricZiel\MattermostPhp\Apps\Events\OnInstallEvent;
use CedricZiel\MattermostPhp\Apps\Events\OnManifestRequestEvent;
use CedricZiel\MattermostPhp\Apps\Events\OnUninstallEvent;
use CedricZiel\MattermostPhp\Apps\Events\OnVersionChangedEvent;
use CedricZiel\MattermostPhp\Apps\Response\OkResponse;
use GuzzleHttp\Psr7\Response;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class MattermostApp implements RequestHandlerInterface
{
    /**
     * @var array<string, array<LocationBinding>>
     */
    protected $locationBindings;

    public function __construct(
        protected readonly string $app_id,
        protected readonly string $display_name,
        protected readonly string $homepage_url,
        protected readonly ?string $description = null,
        protected readonly ?string $version = null,
        protected ?Call $on_install = null,
        protected ?Call $on_uninstall = null,
        protected ?Call $on_version_changed = null,
        protected ?array  $requestedLocations = null,
        protected ?array  $requestedPermissions = null,
        protected ?Call $bindings = null,
        protected ?HttpDeploymentDescriptor $http = null,

        protected ?EventDispatcherInterface $eventDispatcher = null,
    ) {}

    public static function create(string $name, string $display_name, string $homepage_url): static {
        return new static($name, $display_name, $homepage_url);
    }

    public function getManifest(): Manifest
    {

        return new Manifest(
            $this->app_id,
            $this->display_name,
            $this->homepage_url,
            bindings: $this->bindings,
            onInstall: $this->on_install,
            onUnInstall: $this->on_uninstall,
            onVersionChanged: $this->on_version_changed,
            requestedLocations: $this->requestedLocations,
            requestedPermissions: $this->requestedPermissions,
            http: $this->http,
        );
    }

    public function withEventDispatcher(EventDispatcherInterface $eventDispatcher): static
    {
        $this->eventDispatcher = $eventDispatcher;

        return $this;
    }

    public function withOnInstall(Call $call): static
    {
        $this->on_install = $call;

        return $this;
    }

    public function withOnVersionChanged(Call $call): static
    {
        $this->on_version_changed = $call;

        return $this;
    }

    public function withBindings(Call $call): static
    {
        $this->bindings = $call;

        return $this;
    }

    public function addBinding(Location $location, LocationBinding $binding): static
    {
        if ($this->requestedLocations === null) {
            $this->requestedLocations = [];
        }

        if (!in_array($location, $this->requestedLocations, true)) {
            $this->requestedLocations[] = $location;
        }

        if ($this->locationBindings === null) {
            $this->locationBindings = [];
        }

        if (!array_key_exists($location->value, $this->locationBindings)) {
            $this->locationBindings[$location->value] = [];
        }

        $this->locationBindings[$location->value][] = $binding;

        return $this;
    }

    public function withHttp(HttpDeploymentDescriptor $httpDeploymentDescriptor): static
    {
        $this->http = $httpDeploymentDescriptor;

        return $this;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $rootUrl = $this->http->getRootUrl();
        $rootPath = parse_url($rootUrl, PHP_URL_PATH) ?? '/';

        /**
         * path == "/manifest.json"
         */
        $path = $request->getRequestTarget() ?? '/';
        if (str_starts_with($path, $rootPath)) {
            $path = '/' . ltrim(substr($path, strlen($rootPath)), '/');
        }

        if ('/bindings' === $path) {
            return $this->handleBindings($request);
        } elseif ('/on-install' === $path) {
            return $this->handleOnInstall($request);
        } elseif ('/on-uninstall' === $path) {
            return $this->handleOnUninstall($request);
        } elseif ('/version-changed' === $path) {
            return $this->handleOnVersionChanged($request);
        } elseif ('/manifest.json' === $path) {
            return $this->handleManifest($request);
        }

        return new Response(404);
    }

    public function handleBindings(ServerRequestInterface $request): ResponseInterface
    {
        $b = [];
        foreach ($this->locationBindings as $location => $bindings) {
            $bs = [];
            foreach ($bindings as $binding) {
                $bs[] = $binding;
            }

            $topLevelBinding = new TopLevelBinding(
                location: Location::from($location),
                bindings: $bs,
            );

            $b[] = $topLevelBinding;
        }
        $response = new Response(
            200,
            ['content-type' => ['application/json']],
            json_encode(new OkResponse(
                data: $b,
            ))
        );

        $event = new OnBindingsRequestEvent($this, $request, $response);
        $this->eventDispatcher?->dispatch($event);

        return $event->getResponse();
    }

    public function handleOnInstall(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response(
            200,
            ['content-type' => ['application/json']],
            json_encode(new OkResponse())
        );

        $event = new OnInstallEvent($this, $request, $response);
        $this->eventDispatcher?->dispatch($event);

        return $event->getResponse();
    }

    private function handleOnUninstall(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response(
            200,
            ['content-type' => ['application/json']],
            json_encode(new OkResponse())
        );

        $event = new OnUninstallEvent($this, $request, $response);
        $this->eventDispatcher?->dispatch($event);

        return $event->getResponse();
    }

    public function handleOnVersionChanged(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response(
            200,
            ['content-type' => ['application/json']],
            json_encode(new OkResponse())
        );

        $event = new OnVersionChangedEvent($this, $request, $response);
        $this->eventDispatcher?->dispatch($event);

        return $event->getResponse();
    }

    public function handleManifest(ServerRequestInterface $request): ResponseInterface
    {
        $response = new Response(
            200,
            ['content-type' => ['application/json']],
            json_encode($this->getManifest())
        );

        $event = new OnManifestRequestEvent($this, $request, $response);
        $this->eventDispatcher?->dispatch($event);

        return $event->getResponse();
    }

    public function requestPermission(AppPermission $appPermission): static
    {
        if ($this->requestedPermissions === null) {
            $this->requestedPermissions = [];
        }

        if (!in_array($appPermission, $this->requestedPermissions, true)) {
            $this->requestedPermissions[] = $appPermission;
        }

        return $this;
    }
}
