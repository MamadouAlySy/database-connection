<?php

declare(strict_types=1);

namespace MamadouAlySy;

use Exception;
use MamadouAlySy\Contract\ConnectionContract;
use MamadouAlySy\Exception\ConnectionException;
use PDO;

class Connection implements ConnectionContract
{
    protected ?PDO $pdoInstance = null;
    protected array $credentials = [];
    protected array $options = [];

    public function __construct(array $credentials = [], array $options = [])
    {
        $this->credentials = $credentials;
        $this->options = $options;
    }

    /**
     * @inheritDoc
     */
    public function open(): PDO
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
