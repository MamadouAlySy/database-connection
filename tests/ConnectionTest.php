<?php

declare(strict_types=1);

namespace MamadouAlySy\Tests;

use MamadouAlySy\Contract\ConnectionContract;
use MamadouAlySy\Connection;
use MamadouAlySy\Exception\ConnectionException;
use PHPUnit\Framework\TestCase;

class ConnectionTest extends TestCase
{
    protected ConnectionContract $databaseConnection;

    protected function setUp(): void
    {
        parent::setUp();
        $this->databaseConnection = new Connection([
            'dsn' => 'sqlite:sqlite.db',
            'user' => null,
            'password' => null
        ]);
    }

    public function testCanOpenAConnection()
    {
        $this->databaseConnection->open();
        $this->assertFalse($this->databaseConnection->isClosed());
    }

    public function testWillThrowAnException()
    {
        $this->expectException(ConnectionException::class);
        $this->databaseConnection = new Connection([
            'dsn' => 'unknown',
            'user' => null,
            'password' => null
        ]);
        $this->databaseConnection->open();
    }
}
