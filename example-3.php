<?php
require_once 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Processor\WebProcessor;

$log = new Logger('my_logger');
$log->pushHandler(new StreamHandler('var/log/example_3.log'));

// Adding extra data with processor
$log->pushProcessor(new MemoryUsageProcessor());
$log->pushProcessor(new WebProcessor());

$log->info('User logged in', ['email' => 'johny@hotmail.com']);
$log->info('User logged in', $_POST); // be aware, passwords in your logs are not ok

echo "Welcome Johny";
