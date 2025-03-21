<?php

declare(strict_types=1);

namespace BeastBytes\Token\Factory\Uuid4\Tests;

use BeastBytes\Token\Factory\Uuid4\TokenFactory;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

final class TokenFactoryTest extends TestCase
{
    private TokenFactory $factory;

    protected function setUp(): void
    {
        $this->factory = new TokenFactory();
    }

    public function testCreateToken(): void
    {
        $token = $this->factory->createToken();

        $this->assertIsString($token);
        $this->assertTrue(Uuid::isValid($token), 'Token should be a valid UUID');
    }

    public function testCreateTokenReturnsUuid4(): void
    {
        $token = $this->factory->createToken();
        $uuid = Uuid::fromString($token);

        $this->assertEquals(4, $uuid->getVersion(), 'Token should be a UUID version 4');
    }

    public function testTokensAreUnique(): void
    {
        $tokens = [];
        $count = 10;

        for ($i = 0; $i < $count; $i++) {
            $tokens[] = $this->factory->createToken();
        }

        $this->assertCount($count, array_unique($tokens), 'All generated tokens should be unique');
    }

    public function testTokenLength(): void
    {
        $token = $this->factory->createToken();

        // Standard UUID string format is 36 characters (32 hex digits + 4 hyphens)
        $this->assertEquals(36, strlen($token), 'Token should be 36 characters long');
    }

    public function testTokenFormat(): void
    {
        $token = $this->factory->createToken();

        // UUID format: 8-4-4-4-12 hexadecimal digits
        $this->assertMatchesRegularExpression(
            '/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i',
            $token,
            'Token should match UUID4 format'
        );
    }
}
