<?php

declare(strict_types=1);

namespace Cooper;

use Cooper\DTO\Sentence;
use Cooper\Requests\GetSentence;
use ReflectionException;
use Saloon\Contracts\Response;
use Saloon\Exceptions\InvalidResponseClassException;
use Saloon\Exceptions\PendingRequestException;
use Saloon\Http\Connector;
use Cooper\Responses\DailyResponse;

class Daily extends Connector
{
    /**
     * @var string|null
     */
    protected ?string $response = DailyResponse::class;

    /**
     * Resolve the base URL of the service.
     *
     * @return string
     */
    public function resolveBaseUrl(): string
    {
        return 'https://sentence.iciba.com';
    }

    /**
     * Define default headers
     *
     * @return string[]
     */
    protected function defaultHeaders(): array
    {
        return [
            'Accept'       => 'application/json',
            'Content-Type' => 'application/json',
        ];
    }

    /**
     * @param string|null $title
     * @return Response
     * @throws ReflectionException
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     */
    public function getSentence(string $title = null): Response
    {
        $title = $title ?: date('Y-m-d');

        return $this->send(new GetSentence($title));
    }

    /**
     * @param string|null $title
     * @return mixed
     * @throws InvalidResponseClassException
     * @throws PendingRequestException
     * @throws ReflectionException
     */
    public function getSentenceDTO(string $title = null): Sentence
    {
        return $this->getSentence($title)->dto();
    }
}
