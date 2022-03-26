<?php

declare (strict_types=1);

namespace MamadouAlySy;

use PDO;
use Exception;
use MamadouAlySy\Exception\ConnectionException;
use MamadouAlySy\Interfaces\ConnectionInterface;

class Connection implements ConnectionInterface
{
    protected ?PDO $pdoInstance = null;

    public function __construct(protected array $credentials = [], protected array $options = []) {}

    /**
     * @inheritDoc
     */
    public function open() : PDO
    {
        if ($this->isClosed()) {
            try {
                $this->pdoInstance = new PDO(
                    $this->credentials['dsn'],
                    $this->credentials['user'] ?? null,
                    $this->credentials['password'] ?? null,
                    $this->options
                );
            } catch (Exception $e) {
                throw new ConnectionException($e->getMessage(), (int) $e->getCode());
            }
        }

        return $this->pdoInstance;
    }

    /**
     * @inheritDoc
     */
    public function isClosed(): bool
    {
        return is_null($this->pdoInstance);
    }

    /**
     * @inheritDoc
     */
    public function close(): void
    {
        $this->pdoInstance = null;
    }
}
