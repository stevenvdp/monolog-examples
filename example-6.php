<?php
require_once 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use \Bramus\Monolog\Formatter\ColoredLineFormatter;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Handler\NativeMailerHandler;

$log = new Logger('system');

// Formatting console handler
$consoleHandler = new StreamHandler('php://stdout');
$consoleHandler->setFormatter(new ColoredLineFormatter());
$log->pushHandler($consoleHandler);

$log->pushHandler(
    new NativeMailerHandler(
        'support@yolo.com',
        'Crazy App - monitor',
        'no-reply@crazyapp.be',
        \Monolog\Logger::DEBUG
    )
);

$log->debug('Detailed debug information');
$log->info('Interesting events. Examples: User logs in, SQL logs');
$log->notice('Normal but significant events.');
$log->warning('Exceptional occurrences that are not errors. Examples: Use of deprecated APIs, poor use of an API, undesirable things that are not necessarily wrong.');
$log->error('Runtime errors that do not require immediate action but should typically be logged and monitored.');
$log->critical('Critical conditions. Example: Application component unavailable, unexpected exception.');
$log->alert('Action must be taken immediately. Example: Entire website down, database unavailable, etc. This should trigger the SMS alerts and wake you up.');
$log->emergency('Emergency: system is unusable.');
