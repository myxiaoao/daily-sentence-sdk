<?php

namespace Cooper\DTO;

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
        public string $video,
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