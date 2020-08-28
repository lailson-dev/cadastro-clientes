<?php

namespace app\classes;

class Message
{
	public static function add(array $messages)
	{
		foreach ($messages as $key => $message) {
			if (!self::hasSessionWithKey('flash', $key))
				$_SESSION['flash'][$key] = $message;
		}
	}

	public static function get()
	{
		if (self::hasSession('flash')) {
			$messages = $_SESSION['flash'];
			self::destroy();
			return $messages;
		}

		return '';		
	}

	private static function destroy()
	{
		unset($_SESSION['flash']);
	}

	private static function hasSessionWithKey($sessionName, $key)
	{
		return isset($_SESSION[$sessionName][$key]) ? true : false;
	}

	private static function hasSession($sessionName)
	{
		return isset($_SESSION[$sessionName]) ? true : false;
	}
}