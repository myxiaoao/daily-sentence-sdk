<?php

declare(strict_types=1);

namespace Cooper\Daily\DTO;

use Saloon\Contracts\DataObjects\WithResponse;
use Saloon\Contracts\Response;
use Saloon\Traits\Responses\HasResponse;

class Sentence implements WithResponse
{
    use HasResponse;

    public function __construct(
        public string $english,
        public string $chinese,
        public string $date,
        public string $audio,
        public array $banner,
    ) {
    }

    public static function fromResponse(Response $response): self
    {
        $data = $response->json();
        $banner = [$data['picture'], $data['picture2'], $data['picture3']];

        return new static($data['content'], $data['note'], $data['title'], $data['tts'], $banner);
    }
}