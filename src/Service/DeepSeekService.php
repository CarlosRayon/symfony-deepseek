<?php

namespace App\Service;

use DeepSeek\DeepSeekClient;
use DeepSeek\Enums\Models;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class DeepSeekService
{
    private string $apiKey;
    private string $apiUrl;
    private int $timeout;

    private array $responseCompleted;
    private string $responseContent;

    public function __construct(
        private ParameterBagInterface $parameter
    ) {
        $this->apiUrl = $this->parameter->get('deepseek_api_url');
        $this->apiKey = $this->parameter->get('deepseek_api_key');
        $this->timeout =  $this->parameter->get('deepseek_api_timeout');
    }

    public function getDataFromDeepSeek(string $content): self
    {
        $client = DeepSeekClient::build(
            apiKey: $this->apiKey,
            baseUrl: $this->apiUrl,
            timeout: $this->timeout,
            clientType:'symfony'
        );
        // $response = $client->getModelsList()->run();
        $client->setTemperature(1.3); // https://api-docs.deepseek.com/quick_start/parameter_settings (default 1.3)
        $client->withModel(Models::CHAT->value); // Default

        $response = $client->query($content)->run();

        $this->handlerDeepSeekResponse($response);

        return $this;
    }

    public function getResponseContent(): string
    {
        return $this->responseCompleted['choices'][0]['message']['content'];
    }

    private function handlerDeepSeekResponse(string $response): self
    {
        $this->responseCompleted = json_decode($response, true);

        return $this;
    }
}
