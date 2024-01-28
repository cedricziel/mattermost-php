<?php
require_once __DIR__.'/vendor/autoload.php';

use CedricZiel\MattermostPhp\Client\Endpoint\PostsEndpoint;
use CedricZiel\MattermostPhp\Client\Model\CreatePostRequest;

$postsEndpoint = new PostsEndpoint(getenv('MATTERMOST_SITE_URL'), getenv('MATTERMOST_TOKEN'));
$postsEndpoint->createPost(true, new CreatePostRequest());
