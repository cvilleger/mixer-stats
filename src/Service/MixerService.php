<?php

namespace App\Service;

use App\Document\Channel;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MixerService
{
    private $httpClient;
    private $documentManager;

    public function __construct(HttpClientInterface $httpClient, DocumentManager $documentManager)
    {
        $this->httpClient = $httpClient;
        $this->documentManager = $documentManager;
    }

    public function storeDataFromExternalApi(): void
    {
        $url = 'https://mixer.com/api/v1/channels?order=viewersCurrent:DESC&limit=20&where=languageId:eq:fr';

        $response = $this->httpClient->request('GET', $url);
        $statusCode = $response->getStatusCode();
        $data = $response->toArray();

        foreach ($data as $content) {
            $channel = new Channel();
            $channel->setContent($content);
            $this->documentManager->persist($channel);
        }

        $this->documentManager->flush();
    }
}