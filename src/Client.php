<?php
namespace Tykus\SolisCloud;

use DateTime;
use DateTimeZone;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Psr7\Response ;

class Client
{
    private GuzzleHttpClient $client;
    private Response $response;

    public function __construct(private string $keyId, private string $keySecret, private string $baseUrl)
    {
        $this->client = new GuzzleHttpClient(['base_uri' => $baseUrl]);
    }

    public function __call($name, $arguments): mixed
    {
        $endpoint = $arguments[0] ?? '';
        $parameters = $arguments[1] ?? [];

        return $this->call($endpoint, $parameters, strtoupper($name));
    }


    /**
     * Call the SolisCloud API endpoint
     * @param string $endpoint SolisCloud API endpoint
     * @param array $parameters Request payload
     * @return array
     */
    protected function call(Endpoints $endpoint, array $parameters = [], $method = 'POST'): self
    {
        $endpoint = $endpoint->value;
        $contentMD5 = $this->getDigest(json_encode($parameters));
        $contentType = 'application/json';
        $date = $this->getGMTDate();
        $signature = "{$method}\n{$contentMD5}\n{$contentType}\n{$date}\n{$endpoint}";


        $this->response = $this->client->request($method, $endpoint, [
            'headers' => [
                'Authorization' => "API {$this->keyId}:{$this->signSignature($signature)}",
                'Content-Type' => $contentType,
                'Content-MD5' => $contentMD5,
                'Date' => $date,
            ],
            'json' => $parameters,
        ]);

        return $this;
    }

    public function body(): string
    {
        return $this->response->getBody();
    }

    public function json(?string $key = null): array
    {
        return json_decode($this->body(), true);
    }

    protected function getUrl(string $endpoint): string
    {
        return sprintf('%s%s', $this->baseUrl, $endpoint);
    }

    protected function getGMTDate(): string
    {
        $tz = new DateTimeZone('GMT');
        $date = new DateTime('now', $tz);

        return $date->format('D, j M Y H:i:s e');
    }

    /**
     * 1. Calculate the MD5 encrypted binary array (128 bits)
     * 2. Base64 encode the binary (32 bit string)
     * @param string $string JSON parameters
     * @return string
     */
    protected function getDigest(string $string = ''): string
    {
        return base64_encode(hex2bin(md5($string)));
    }

    protected function signSignature(string $signature): string
    {
        return base64_encode(hash_hmac('sha1', $signature, $this->keySecret, true));
    }
}

