<?php

declare(strict_types=1);

namespace MamadouAlySy\Tests;

use MamadouAlySy\Contract\DatabaseConnectionContract;
use MamadouAlySy\DatabaseConnection;
use MamadouAlySy\Exception\DatabaseConnectionException;
use PHPUnit\Framework\TestCase;

class DatabaseConnectionTest extends TestCase
{
    protected DatabaseConnectionContract $databaseConnection;

    protected function setUp(): void
    {
        parent::setUp();
        $this->databaseConnection = new DatabaseConnection([
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
        $this->expectException(DatabaseConnectionException::class);
        $this->databaseConnection = new DatabaseConnection([
            'dsn' => 'sdfgjkds',
            'user' => null,
            'password' => null
        ]);
        $this->databaseConnection->open();
    }
}
