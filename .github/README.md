# Daily Sentence PHP SDK

One sentence per day PHP SDK for ICiBa.

## Available Requests

- `Cooper\Requests\GetSentence`

## Installation

Use Composer to install this SDK

```
composer require cooper/daily-sentence-sdk
```

## Usage

Simply call the `send` method with the request class you would like to send. Once sent, a `DailyResponse` is returned.

```php
<?php

use Cooper\Daily;
use Cooper\Requests\GetSentence;

$daily = new Daily();

$response = $daily->send(new GetSentence);
```
