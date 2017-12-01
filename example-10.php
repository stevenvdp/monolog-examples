<?php
require_once 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// Different channels <> different files
$systemLog = new Logger('system');
$systemLog->pushHandler(new StreamHandler('var/log/example_10.log'));

$importLog = new Logger('import');
$importLog->pushHandler(new StreamHandler('var/log/example_10.log'));


$systemLog->info('System log info line');
$importLog->info('Import log info line');
