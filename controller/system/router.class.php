<?php
include 'controller/system/AltoRouter.class.php';
include 'system.class.php';

class router
{
	function __construct()
	{
		$this->router = new AltoRouter();
	}

	public function start_router()
	{
		$this->load_router();
		$this->end_router();
	}

	private function load_router()
	{
		$this->router->map("GET", "/", function () {
			$this->loadpage("home");
		});
		$this->router->map("GET", "/bidask", function () {
			$this->loadpageWithoutSide("bidask");
		});

		$this->router->map("GET", "/tickmatch", function () {
			$this->loadpageWithoutSide("tickmatch");
		});

		$this->router->map("POST", "/api/v1/checksymbol", function () {
			$this->loadapi("checksymbol");
		});

		$this->router->map("POST", "/api/v1/querybidask", function () {
			$this->loadapi("querybidask");
		});

		$this->router->map("POST", "/api/v1/analyze", function () {
			$this->loadapi("analyze");
		});

		$this->router->map("POST", "/api/v1/analyze1", function () {
			$this->loadapi("analyze1");
		});

		// $this->router->map("POST", "/api/v1/save_score", function () {
		// 	$this->loadapi("save_score");
		// });

		// $this->router->map("POST", "/api/v1/getAllCust", function () {
		// 	$this->loadapi("getAllCust");
		// });

		$this->router->map("GET", "/s50", function () {
			$this->loadpageWithoutSide("s50");
		});
	}

	private function end_router()
	{
		$match = $this->router->match();
		if (is_array($match) && is_callable($match['target'])) {
			call_user_func_array($match['target'], $match['params']);
		} else {
			$this->loadpageerror();
		}
	}
	private static function htmlheader()
	{
		//require_once 'views/body/style.php';
		require_once 'views/body/header.php';
		require_once 'views/body/navbar.php';
		require_once 'views/body/sidebar.php';
	}
	private static function htmlWithoutSide()
	{
		require_once 'views/body/header.php';
	}
	private static function htmlfooter()
	{
		require_once 'views/body/footer.text.php';
		require_once 'views/body/footer.php';
	}
	private static function htmlfooterWithoutText()
	{
		require_once 'views/body/footer.php';
	}
	private static function htmlheader2()
	{
		require_once 'views/body/header2.php';
	}
	private static function htmlfooter2()
	{
		require_once 'views/body/footer2.php';
	}
	private function loadpage3($page)
	{
		$page_now = $page;
		$class = new system();
		require_once "views/page/" . $page . ".php";
	}
	private function loadpage($page)
	{
		$page_now = $page;
		$class = new system();
		self::htmlheader();
		require_once "views/page/" . $page . ".php";
		self::htmlfooter();
	}
	private function loadpage2($page)
	{
		$page_now = $page;
		$class = new system();
		self::htmlheader2();
		require_once "views/page/" . $page . ".php";
		self::htmlfooter2();
	}
	private function loadpageerror()
	{
		require_once "views/page/404.php";
	}
	private function loadapi($nameapi)
	{
		$class = new system();
		require_once "controller/api/" . $nameapi . ".php";
	}

	private function loadpageWithoutSide($page)
	{
		$page_now = $page;
		$class = new system();
		self::htmlWithoutSide();
		require_once "views/page/" . $page . ".php";
		self::htmlfooterWithoutText();
	}
}