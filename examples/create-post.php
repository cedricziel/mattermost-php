<?php
require_once __DIR__.'/../vendor/autoload.php';

use CedricZiel\MattermostPhp\Client\Endpoint\ChannelsEndpoint;
use CedricZiel\MattermostPhp\Client\Endpoint\PostsEndpoint;
use CedricZiel\MattermostPhp\Client\Endpoint\TeamsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\CreatePostRequest;

try {
    $teamsEndpoint = new TeamsEndpoint(getenv('MATTERMOST_SITE_URL'), getenv('MATTERMOST_TOKEN'));
    $team = $teamsEndpoint->getTeamByName(getenv('MATTERMOST_TEAM_NAME'));

    $channelsEndpoint = new ChannelsEndpoint(getenv('MATTERMOST_SITE_URL'), getenv('MATTERMOST_TOKEN'));
    $allChannels = $channelsEndpoint->getAllChannels(per_page: 100);

    $channel = $channelsEndpoint->getChannelByName($team->id, 'town-square');

    $postsEndpoint = new PostsEndpoint(getenv('MATTERMOST_SITE_URL'), getenv('MATTERMOST_TOKEN'));
    $post = $postsEndpoint->createPost(true, new CreatePostRequest($channel->id, 'Hello World!'));
    var_dump($post);
} catch (\Throwable $e) {
    echo $e->getMessage();
}
