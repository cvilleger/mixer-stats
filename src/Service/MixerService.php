<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class MixerService
{
    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function getData(): array
    {
        $url = 'https://mixer.com/api/v1/channels?order=viewersCurrent:DESC&limit=20&where=languageId:eq:fr';
        $response = $this->httpClient->request('GET', $url);
        return $response->toArray();
    }
}
