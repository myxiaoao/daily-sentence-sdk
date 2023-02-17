# Daily Sentence PHP SDK

One sentence per day PHP SDK for ICiBa.

## Installation

Use Composer to install this SDK

```
composer require cooper/daily-sentence-sdk
```

## Usage

Simply call the `getSentence` method with the request class you would like to send.

```php
<?php

$daily = new \Cooper\Daily\DailyConnector();
$response = $daily->getSentence('2023-02-15');
$response->dto(); // returns an DTO class 
```
