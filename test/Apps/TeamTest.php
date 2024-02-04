<?php

namespace CedricZiel\MattermostPhp\Test\Apps;

use CedricZiel\MattermostPhp\Apps\Team;
use CedricZiel\MattermostPhp\Request;
use CedricZiel\MattermostPhp\Test\MattermostTestCase;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;

#[CoversClass(Team::class)]
class TeamTest extends MattermostTestCase
{
    #[Test]
    public function canCreate()
    {
        $team = new Team(
            'id',
            0,
            0,
            0,
            'display_name',
            'description',
            'email',
            'type',
            'allowed_domains',
            'invite_id',
            'allow_open_invite',
            'scheme_id',
            'group_constrained',
            "null",
            false,
            0,
            0,
        );
        self::assertInstanceOf(Team::class, $team);
    }

    #[Test]
    public function canDeSerialize()
    {
        $json = file_get_contents(__DIR__ . '/request-with-team.json');;

        $request = $this->serializer->deserialize($json, Request::class, 'json');

        self::assertInstanceOf(Request::class, $request);
        self::assertInstanceOf(Team::class, $request->getContext()->getTeam());
        self::assertEquals('sss', $request->getContext()->getTeam()->id);
    }

    #[Test]
    public function canDeserializeMinimal()
    {
        $json = file_get_contents(__DIR__ . '/request-with-team-id.json');;

        $request = $this->serializer->deserialize($json, Request::class, 'json');

        self::assertInstanceOf(Request::class, $request);
        self::assertInstanceOf(Team::class, $request->getContext()->getTeam());
        self::assertEquals('teamid', $request->getContext()->getTeam()->id);
    }
}
