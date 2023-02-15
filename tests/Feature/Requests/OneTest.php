<?php

declare(strict_types=1);

use Cooper\Daily;
use Cooper\Responses\DailyResponse;

test('can retrieve on sentence from the api', function () {
    $daily = new Daily();
    $daily->withMockClient(mockClient());

    $response = $daily->getSentence();

    expect($response)->toBeInstanceOf(DailyResponse::class);
});
