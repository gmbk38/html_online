<!-- A9954387A32BE816C2585A95ADF828D3 -->

<?php

use GuzzleHttp\Client;
use Steam\Configuration;
use Steam\Runner\GuzzleRunner;
use Steam\Runner\DecodeJsonStringRunner;
use Steam\Steam;
use Steam\Utility\GuzzleUrlBuilder;

$steam = new Steam(new Configuration([
    Configuration::STEAM_KEY => 'A9954387A32BE816C2585A95ADF828D3'
]));
$steam->addRunner(new GuzzleRunner(new Client(), new GuzzleUrlBuilder()));
$steam->addRunner(new DecodeJsonStringRunner());

/** @var array $result */
$result = $steam->run(new \Steam\Command\Apps\GetAppList());

var_dump($result);