<?php 

namespace Mateodioev\RapidApi;

use Mateodioev\Request\Request;
use Mateodioev\Utils\Network;

class Client
{
    private string $apiKey;
    private Request $api;

    public string $url;

    public function __construct(string $apiKey) {
        $this->api = new Request;
        $this->apiKey = $apiKey;
    }

    public function setUrl(string $url): Client
    {
        if (empty($url) || Network::IsValidUrl($url) === false) {
            throw new RapidApiException('Invalid URL');
        }
        $this->url = $url;
        $this->init();

        $host = parse_url($url, PHP_URL_HOST);
        return $this->setHeaders(['X-RapidAPI-Host: ' . $host]);
    }

    /**
     * An array of HTTP header fields to set, in the format `array('Content-type: text/plain', 'Content-length: 100')`
     */
    public function setHeaders(array $headers): Client
    {
        $this->api->addHeaders($headers);
        return $this;
    }

    private function init(): Client
    {
        $this->api->init($this->url);
        return $this;
    }

    public function setMethod(string $httpMethod = 'GET'): Client
    {
        $this->api->setMethod($httpMethod);
        return $this;
    }

    public function run(?string $endpoint = null)
    {
        return $this->api->Run($endpoint);
    }

    public static function create(string $apiKey, string $url): Client
    {
        $client = new self($apiKey);
        $client->setUrl($url);
        $client->setHeaders(['X-RapidAPI-Key: ' . $apiKey]);
        return $client;
    }
}