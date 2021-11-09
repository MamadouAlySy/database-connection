# database-connection

A simple php Database connection class

## Installation

```bash
    composer require mamadou-aly-sy/database-connection
```

## Usage

```php
<?php

require_once './vendor/autoload.php';

$credentials = [
    'dsn' => 'sqlite:sqlite.db',
    'user' => null,
    'password' => null
];

$connection = new \MamadouAlySy\Connection($credentials);

// open a the connection
$connection->open(); // returns PDO instance
```
