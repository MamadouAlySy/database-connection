<?php

declare(strict_types=1);

namespace MamadouAlySy;

use Exception;
use MamadouAlySy\Contract\DatabaseConnectionContract;
use MamadouAlySy\Exception\DatabaseConnectionException;
use PDO;

class DatabaseConnection implements DatabaseConnectionContract
{
    protected ?PDO $pdoInstance = null;

    public function __construct(
        protected array $credentials = [],
        protected array $options = []
    ) {
    }

    /**
     * Open a database connection
     *
     * @return void
     */
    public function open(): void
    {
        if ($this->isClosed()) {
            try {
                $this->pdoInstance = new PDO(
                    $this->credentials['dsn'],
                    $this->credentials['user'],
                    $this->credentials['password'],
                    $this->options
                );
            } catch (Exception $e) {
                throw new DatabaseConnectionException($e->getMessage(), (int) $e->getCode());
            }
        }
    }

    /**
     * Check if the connection is closed
     *
     * @return boolean
     */
    public function isClosed(): bool
    {
        return is_null($this->pdoInstance);
    }

    /**
     * Return the database connection
     *
     * @return PDO
     */
    public function getConnection(): ?PDO
    {
        return $this->pdoInstance;
    }

    /**
     * Close the database connection
     *
     * @return void
     */
    public function close(): void
    {
        $this->pdoInstance = null;
    }
}
