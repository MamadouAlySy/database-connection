# database-connection

A simple php Database connection class

## Requirements
- php >= 8.1
- php-sqlite *

## Installation

```bash
    composer require mamadou-aly-sy/database-connection
```

## Usage

```php
<?php

require_once './vendor/autoload.php';

// only the dsn is required if there is no username or password you dont need to specify them
$credentials = ['dsn' => 'sqlite:sqlite.db'];

$connection = new \MamadouAlySy\Database\Connection($credentials);

// open a the connection
$connection->open(); // returns PDO instance
```
