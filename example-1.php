<?php
require_once 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * Basic example for monolog usage
 */
$log = new Logger('my_logger');
$log->pushHandler(new StreamHandler('var/log/example_1.log'));

$log->debug('Detailed debug information');
$log->info('Interesting events. Examples: User logs in, SQL logs');
$log->notice('Normal but significant events.');
$log->warning('Exceptional occurrences that are not errors. Examples: Use of deprecated APIs, poor use of an API, undesirable things that are not necessarily wrong.');
$log->error('Runtime errors that do not require immediate action but should typically be logged and monitored.');
$log->critical('Critical conditions. Example: Application component unavailable, unexpected exception.');
$log->alert('Action must be taken immediately. Example: Entire website down, database unavailable, etc. This should trigger the SMS alerts and wake you up.');
$log->emergency('Emergency: system is unusable.');
