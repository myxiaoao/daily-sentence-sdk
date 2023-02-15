<?php

declare(strict_types=1);

namespace Cooper\Requests;

use Cooper\DTO\Sentence;
use Saloon\Contracts\Body\HasBody;
use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class GetSentence extends Request implements HasBody
{
    use HasJsonBody;

    /**
     * HTTP Method
     *
     * @var Method
     */
    protected Method $method = Method::GET;

    /**
     * @param string $title
     */
    public function __construct(protected string $title)
    {
    }

    /**
     * @param Response $response
     * @return Sentence
     */
    public function createDtoFromResponse(Response $response): Sentence
    {
        return Sentence::fromResponse($response);
    }

    /**
     * Resolve the endpoint
     *
     * @return string
     */
    public function resolveEndpoint(): string
    {
        return '/index.php';
    }

    /**
     * @return array
     */
    protected function defaultQuery(): array
    {
        return [
            'c'     => 'dailysentence',
            'm'     => 'getdetail',
            'title' => $this->title,
            '_'     => time(),
        ];
    }

    /**
     * @return int[]
     */
    protected function defaultConfig(): array
    {
        return [
            'timeout' => 60,
        ];
    }
}
