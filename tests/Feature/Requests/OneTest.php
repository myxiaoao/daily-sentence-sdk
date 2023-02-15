<?php

declare(strict_types=1);

use Cooper\Daily;
use Cooper\Responses\DailyResponse;

test('can retrieve sentence from the api', function () {
    $daily = new Daily();
    $daily->withMockClient(mockClient());

    $response = $daily->getSentence();

    expect($response)->toBeInstanceOf(DailyResponse::class);
});

test('sentence title eq response date', function () {
    $daily = new Daily();
    $date = date('Y-m-d');
    $response = $daily->getSentence($date)->dto();

    expect($response->date)->toEqual($date);
});