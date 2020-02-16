<?php 

class session
{
	public static function init()
	{
		session_start();
	}
	public static function set($key,$value)
	{
		$_SESSION[$key]=$value;
	}
	public static function get($key)
	{
		if($_SESSION[$key])
		{
			return $_SESSION[$key];
		}
		else
		{
			return false;
		}
	}
	public static function checksession()
	{
		self::init();
		if(self::get("login")== false)
		{
			self::destory();
			header("Location:login.php");
		}
	}
	public static function destory()
	{
		session_destroy();
		header("Location:login.php");
	}
}

?>