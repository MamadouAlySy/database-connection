<?php

declare(strict_types=1);

namespace MamadouAlySy\Tests;

use MamadouAlySy\Interfaces\ConnectionInterface;
use MamadouAlySy\Connection;
use MamadouAlySy\Exception\ConnectionException;
use PHPUnit\Framework\TestCase;

class ConnectionTest extends TestCase
{
    protected ConnectionInterface $databaseConnection;

    protected function setUp(): void
    {
        parent::setUp();
        $this->databaseConnection = new Connection([
            'dsn' => 'sqlite:sqlite.db',
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
        ]);
        $this->databaseConnection->open();
    }
}
