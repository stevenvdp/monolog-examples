<?php
require_once 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Bramus\Monolog\Formatter\ColoredLineFormatter;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Handler\HipChatHandler;
use Monolog\Formatter\LineFormatter;

// Display messages on console
$log = new Logger('system');
$output = "%datetime% > %message%\n";
// finally, create a formatter
$formatter = new LineFormatter($output);
$hipChatHandler = new HipChatHandler(
    <apitoken>,
    <roomid>,
    'Monolog',
    true,
    Monolog\Logger::CRITICAL,
    true,
    true,
    'text',
    "company.hipchat.com",
    \Monolog\Handler\HipChatHandler::API_V2
);
$hipChatHandler->setFormatter($formatter);

$log->pushHandler(new StreamHandler('php://stdout'));
$log->pushHandler($hipChatHandler);

$log->warning('Foo');
$log->error('Bar');
$log->critical('Problemen met de website, ticketje aanmaken aub');
