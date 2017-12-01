<?php
require_once 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class MyLogger extends Logger
{
    public function __construct()
    {
        parent::__construct('my_logger');
        $this->pushHandler(new StreamHandler('var/log/example_11.log'));
    }
}

class ImportService
{
    protected $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function import()
    {
        $this->logger->info('Start import process');

        // Serious import shizzle

        $this->logger->info('Finished import process');
    }
}

$importService = new ImportService(new MyLogger());
$importService->import();
