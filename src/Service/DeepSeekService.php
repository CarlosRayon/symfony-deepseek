<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class DeepSeekService
{
    private const API_URL = 'DEEP_SEEK_API_URL';
    private const API_KEY = 'DEEP_SEEK_API_KEY';

    private $httpClient;
    private $apiKey;
    private $apiUrl;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
        $this->apiUrl = $_ENV[self::API_URL];
        $this->apiKey = $_ENV[self::API_KEY];
    }

    public function getDataFromDeepSeek(): array
    {
        $response = $this->httpClient->request('POST', $this->apiUrl, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $this->apiKey,
            ],
            'json' => [
                'model' => 'deepseek-chat',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a helpful assistant'],
                    ['role' => 'user', 'content' => 'Hello'],
                ],
            ],
        ]);

        // if ($response->getStatusCode() !== 200) {
        //     throw new \Exception('Failed to retrieve data from DeepSeek.');
        // }

        return $response->toArray();
    }
}
