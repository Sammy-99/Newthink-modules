<?php

namespace Newthink\CronTab\Cron;

use \Psr\Log\LoggerInterface;

class Test 
{

  protected $logger;

  public function __construct(LoggerInterface $logger) {

    $this->logger = $logger;

  }

  /**

    * Write to system.log

    *

    * @return void

  */

  public function execute() {

    // Do your Stuff
            // $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/cronjob.log');
            // $logger = new \Zend\Log\Logger(); 
            // $logger->addWriter($writer);
            // $logger->info('Newthink_Crontab Cron Works successfully');

    $this->logger->info('Newthink_Crontab Cron Works successfully');

  }

}