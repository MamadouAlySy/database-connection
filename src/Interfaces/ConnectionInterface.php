<?php

declare (strict_types=1);

namespace MamadouAlySy\Interfaces;

use MamadouAlySy\Exception\ConnectionException;
use PDO;

interface ConnectionInterface
{
    /**
     * Open a database connection and return a PDO instance
     *
     * @return PDO|null
     * @throws ConnectionException
     */
    public function open(): ?PDO;

    /**
     * Check if the connection is closed
     *
     * @return boolean
     */
    public function isClosed(): bool;

    /**
     * Close the database connection
     *
     * @return void
     */
    public function close(): void;
}
