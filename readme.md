# RapidApi http client

## Install
```bash
composer require mateodioev/rapidapi
```

## Usage

```php
<?php
use Mateodioev\RapidApi\Client;

require 'path/to/vendor/autoload.php';

$client = Client::create('api Key', 'url');
$result = $client->run('endpoint')->getBody();

var_dump($result);
```
