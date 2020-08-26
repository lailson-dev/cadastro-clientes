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

	public function browserConsoleHandler($type, $message)
	{
		$this->logger->pushHandler(new BrowserConsoleHandler(Logger::DEBUG));
		$this->logger->$type($message, ["logger" => true]);
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

}