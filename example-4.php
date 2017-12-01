<?php
require_once 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Processor\MemoryUsageProcessor;

// Display messages on console
$log = new Logger('system');
$log->pushHandler(new StreamHandler('php://stdout'));
$log->pushHandler(new StreamHandler('var/log/example_4.log'));

$log->warning('Foo');
$log->error('Bar');
