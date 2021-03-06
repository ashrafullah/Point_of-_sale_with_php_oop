<?php
// sesseion class
class Session 
{
	public static function init(){
		@session_start();
	}
	public static function set($key, $val){
		$_SESSION['$key'] = $val;
	}
	public static function get($key){
		if (isset($_SESSION['$key'])) {
			return $_SESSION['$key'];
		}
		else
		{
			return false;
		}
	}

	public static function checksession(){
		self::init();
		if (self::get("login") == false) {
			self::destroy();
		header('Location:../Login/index.php');
		exit();	
		}
	}

	public static function destroy()
	{
		session_destroy();
		header('Location: ../Login/index.php?msg='.urldecode());
		exit();
	}

}
?>