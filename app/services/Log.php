<?php

namespace app\services;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\BrowserConsoleHandler;

class Log
{
	private $logger;

	public function __construct($channel)
	{
		$this->logger = new Logger($channel);
	}

	public function fileStreamHandler($message)
	{
		$this->logger->pushHandler(new StreamHandler(__DIR__.'/../../log/log.txt', Logger::WARNING));
		$this->logger->error($message, [
			"HTTP_HOST" => $_SERVER['HTTP_HOST'],
			"REQUEST_URI" => $_SERVER['REQUEST_URI'],
			"REQUEST_METHOD" => $_SERVER['REQUEST_METHOD'],
			"HTTP_USER_AGENT" => $_SERVER['REQUEST_URI']
		]);
	}

	public function writeLog($code)
	{
		switch ($code) {
			case '1049':
				$this->fileStreamHandler("Unknown database");
				break;

			case '1045':
				$this->fileStreamHandler("Access denied for user");
				break;
			
			case '2002':
				$this->fileStreamHandler("No connections could be made because the target machine actively refused them");
				break;
		}
	}

}