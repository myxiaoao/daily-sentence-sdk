<?php

declare(strict_types=1);

use Cooper\Daily\DailyConnector;
use Cooper\Daily\Responses\DailyResponse;

test('can retrieve sentence from the api', function () {
    $daily = new DailyConnector();
    $daily->withMockClient(mockClient());

    $response = $daily->getSentence();

    expect($response)->toBeInstanceOf(DailyResponse::class);
});

test('sentence title eq response date', function () {
    $daily = new DailyConnector();
    $date = date('Y-m-d');
    $response = $daily->getSentence($date)->dto();

    expect($response->date)->toEqual($date);
});