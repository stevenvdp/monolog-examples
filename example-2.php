<?php
require_once 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('my_logger');
$log->pushHandler(new StreamHandler('var/log/example_2.log'));

// Bad examples
# variables on different lines
$log->info('Start importing users');
$log->info('jimmy@hotmail.com');
$log->info('danny@hotmail.com');
$log->info('johny@hotmail.com');

# variables in log string
$log->info('User logged in (jimmy@hotmail.com)');

$now = new DateTime();
$log->info('User logged in at ' . $now->format('c'));

# no shared context
$log->info('Import user jimmy@hotmail.com');
$log->info('Parse data');
$log->info('Save entity');



// Improvements
// Adding context data
$log->info('Start importing user', ['email' => 'jimmy@hotmail.com']);
$log->info('Start importing user', ['email' => 'danny@hotmail.com']);
$log->info('Start importing user', ['email' => 'johny@hotmail.com']);

$log->info(
    'User logged in',
    ['email' => 'jimmy@hotmail.com']
);

$log->info('Import user', ['email' => 'jimmy@hotmail.com']);
$log->info('Parse data', ['email' => 'jimmy@hotmail.com']);
$log->info('Save entity', ['email' => 'jimmy@hotmail.com']);
