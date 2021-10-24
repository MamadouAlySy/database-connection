<?php

declare(strict_types=1);

namespace MamadouAlySy\Contract;

use PDO;

interface DatabaseConnectionContract
{
    /**
     * Open a database connection
     *
     * @return void
     */
    public function open(): void;

    /**
     * Check if the connection is closed
     *
     * @return boolean
     */
    public function isClosed(): bool;

    /**
     * Return the database connection
     *
     * @return PDO|null
     */
    public function getConnection(): ?PDO;

    /**
     * Close the database connection
     *
     * @return void
     */
    public function close(): void;
}
