<?php

declare ( strict_types = 1 );

namespace MamadouAlySy\Database\Tests;

use MamadouAlySy\Database\Connection;
use MamadouAlySy\Database\Exception\ConnectionException;
use MamadouAlySy\Database\Interfaces\ConnectionInterface;
use PHPUnit\Framework\TestCase;

class ConnectionTest extends TestCase
{
    protected ConnectionInterface $databaseConnection;

    protected function setUp(): void
    {
        $this->databaseConnection = new Connection(['dsn' => 'sqlite:sqlite.db']);
    }

    /**
     * @test
     */
    public function it_can_open_a_new_connection()
    {
        $this->databaseConnection->open();
        $this->assertFalse($this->databaseConnection->isClosed());
    }

    /**
     * @test
     */
    public function it_will_throw_an_exception()
    {
        $this->expectException(ConnectionException::class);
        $this->databaseConnection = new Connection(['dsn' => 'unknown']);
        $this->databaseConnection->open();
    }
}
