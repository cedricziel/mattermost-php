<?php
require_once __DIR__.'/../vendor/autoload.php';

use CedricZiel\MattermostPhp\Client\Endpoint\ChannelsEndpoint;
use CedricZiel\MattermostPhp\Client\Endpoint\PostsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\CreatePostRequest;

try {
    $channelsEndpoint = new ChannelsEndpoint(getenv('MATTERMOST_SITE_URL'), getenv('MATTERMOST_TOKEN'));
    $allChannels = $channelsEndpoint->getAllChannels(per_page: 100);
    var_dump($allChannels);
    $channel = $channelsEndpoint->getChannelByName(getenv('MATTERMOST_TEAM_ID'), 'Town Square');
    var_dump($channel);

    $postsEndpoint = new PostsEndpoint(getenv('MATTERMOST_SITE_URL'), getenv('MATTERMOST_TOKEN'));
    $post = $postsEndpoint->createPost(true, new CreatePostRequest($channel->id, 'Hello World!'));
} catch (\Throwable $e) {
    echo $e->getMessage();
}
