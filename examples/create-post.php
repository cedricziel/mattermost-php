<?php
require_once __DIR__.'/../vendor/autoload.php';

use CedricZiel\MattermostPhp\Client;
use CedricZiel\MattermostPhp\Client\Model\CreatePostRequest;

try {
    $client = new Client(getenv('MATTERMOST_SITE_URL'));
    $client->setToken(getenv('MATTERMOST_TOKEN'));
    $yourUser = $client->authenticate();

    $team = $client->teams()->getTeamByName(getenv('MATTERMOST_TEAM_NAME'));
    $client->channels()->getAllChannels(per_page: 100);
    $channel = $client->channels()->getChannelByName($team->id, 'town-square');

    $post = $client->posts()->createPost(new CreatePostRequest($channel->id, 'Hello World!'), true);
    var_dump($post);
} catch (\Throwable $e) {
    echo $e->getMessage();
}
