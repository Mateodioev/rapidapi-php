<?php 
use Mateodioev\RapidApi\Client;

require __DIR__.'/vendor/autoload.php';

$client = Client::create(
  '862158f957mshdfe27558ac96c2fp1f0689jsnad110074f7d0',
  'https://world-cup1.p.rapidapi.com'
);

echo $client->run('/winners/2018')->setDebug(true);
