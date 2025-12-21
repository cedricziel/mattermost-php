<?php

declare(strict_types=1);

namespace CedricZiel\MattermostPhp\Test\Client\Model;

use CedricZiel\MattermostPhp\Client\Model\Channel;
use CedricZiel\MattermostPhp\Client\Model\StatusOK;
use CedricZiel\MattermostPhp\Client\Model\User;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

#[CoversClass(User::class)]
#[CoversClass(Channel::class)]
#[CoversClass(StatusOK::class)]
class ModelHydrationTest extends TestCase
{
    // ========================================
    // User model tests
    // ========================================

    #[Test]
    public function userHydratesAllFields(): void
    {
        $data = [
            'id' => 'user123',
            'create_at' => 1640000000000,
            'update_at' => 1640000001000,
            'delete_at' => 0,
            'username' => 'johndoe',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'nickname' => 'Johnny',
            'email' => 'john@example.com',
            'email_verified' => true,
            'auth_service' => '',
            'roles' => 'system_user',
            'locale' => 'en',
            'mfa_active' => false,
            'failed_attempts' => 0,
        ];

        $user = User::hydrate($data);

        $this->assertInstanceOf(User::class, $user);
        $this->assertSame('user123', $user->id);
        $this->assertSame(1640000000000, $user->create_at);
        $this->assertSame('johndoe', $user->username);
        $this->assertSame('John', $user->first_name);
        $this->assertSame('Doe', $user->last_name);
        $this->assertSame('john@example.com', $user->email);
        $this->assertTrue($user->email_verified);
        $this->assertFalse($user->mfa_active);
        $this->assertSame(0, $user->failed_attempts);
    }

    #[Test]
    public function userHydratesWithPartialData(): void
    {
        $data = [
            'id' => 'user456',
            'username' => 'minimaluser',
        ];

        $user = User::hydrate($data);

        $this->assertSame('user456', $user->id);
        $this->assertSame('minimaluser', $user->username);
        $this->assertNull($user->email);
        $this->assertNull($user->first_name);
        $this->assertNull($user->create_at);
        $this->assertNull($user->email_verified);
    }

    #[Test]
    public function userHydratesWithNullInput(): void
    {
        $user = User::hydrate(null);

        $this->assertInstanceOf(User::class, $user);
        $this->assertNull($user->id);
        $this->assertNull($user->username);
    }

    #[Test]
    public function userHydratesWithEmptyArray(): void
    {
        $user = User::hydrate([]);

        $this->assertInstanceOf(User::class, $user);
        $this->assertNull($user->id);
        $this->assertNull($user->username);
    }

    // ========================================
    // Channel model tests
    // ========================================

    #[Test]
    public function channelHydratesAllFields(): void
    {
        $data = [
            'id' => 'chan123',
            'create_at' => 1640000000000,
            'update_at' => 1640000001000,
            'delete_at' => 0,
            'team_id' => 'team456',
            'type' => 'O',
            'display_name' => 'General',
            'name' => 'general',
            'header' => 'Welcome to General',
            'purpose' => 'General discussion',
            'last_post_at' => 1640000002000,
            'total_msg_count' => 100,
            'creator_id' => 'user789',
        ];

        $channel = Channel::hydrate($data);

        $this->assertInstanceOf(Channel::class, $channel);
        $this->assertSame('chan123', $channel->id);
        $this->assertSame('team456', $channel->team_id);
        $this->assertSame('O', $channel->type);
        $this->assertSame('General', $channel->display_name);
        $this->assertSame('general', $channel->name);
        $this->assertSame('Welcome to General', $channel->header);
        $this->assertSame(100, $channel->total_msg_count);
    }

    #[Test]
    public function channelHydratesWithPartialData(): void
    {
        $data = [
            'id' => 'chan789',
            'name' => 'test-channel',
            'type' => 'P',
        ];

        $channel = Channel::hydrate($data);

        $this->assertSame('chan789', $channel->id);
        $this->assertSame('test-channel', $channel->name);
        $this->assertSame('P', $channel->type);
        $this->assertNull($channel->team_id);
        $this->assertNull($channel->display_name);
        $this->assertNull($channel->header);
    }

    // ========================================
    // StatusOK model tests
    // ========================================

    #[Test]
    public function statusOkHydrates(): void
    {
        $data = ['status' => 'ok'];

        $status = StatusOK::hydrate($data);

        $this->assertInstanceOf(StatusOK::class, $status);
        $this->assertSame('ok', $status->status);
    }

    #[Test]
    public function statusOkHydratesWithNullInput(): void
    {
        $status = StatusOK::hydrate(null);

        $this->assertInstanceOf(StatusOK::class, $status);
        $this->assertNull($status->status);
    }

    // ========================================
    // Type handling tests
    // ========================================

    #[Test]
    public function hydratesIntegerTypesCorrectly(): void
    {
        $data = [
            'id' => 'user1',
            'create_at' => 1640000000000,
            'failed_attempts' => 3,
        ];

        $user = User::hydrate($data);

        $this->assertIsInt($user->create_at);
        $this->assertIsInt($user->failed_attempts);
    }

    #[Test]
    public function hydratesBooleanTypesCorrectly(): void
    {
        $data = [
            'id' => 'user1',
            'email_verified' => true,
            'mfa_active' => false,
        ];

        $user = User::hydrate($data);

        $this->assertIsBool($user->email_verified);
        $this->assertIsBool($user->mfa_active);
        $this->assertTrue($user->email_verified);
        $this->assertFalse($user->mfa_active);
    }

    #[Test]
    public function hydratesStringTypesCorrectly(): void
    {
        $data = [
            'id' => 'user1',
            'username' => 'testuser',
            'email' => 'test@example.com',
        ];

        $user = User::hydrate($data);

        $this->assertIsString($user->id);
        $this->assertIsString($user->username);
        $this->assertIsString($user->email);
    }
}
