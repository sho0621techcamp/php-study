<?php
	session_start();

	define('DSN', 'mysql:host=db;dbname=myapp;charset=utf8mb4');
	define('DB_USER', 'myappuser');
	define('DB_PASS', 'myapppass');
	//define('SITE_URL', 'http://localhost:8562');
	// ↓に書き換えられる
	define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST']);

	// require_once(__DIR__ . '/Utils.php');
	// require_once(__DIR__ . '/Token.php');
	// require_once(__DIR__ . '/Database.php');
	// require_once(__DIR__ . '/Todo.php');

	//クラスの自動読み込み（Standard Php Library）
	spl_autoload_register(function($class) {

		$prefix = 'MyApp\\';

		if (strpos($class, $prefix) == 0) {
			//sprintf = フォーマットに従った文字列を返す
			// %s 文字列 ※(%d 数値)
			//strlen 文字列の長さを調べる
			$fileName = sprintf(__DIR__ . '/%s.php', substr($class, strlen($prefix)));

			if (file_exists($fileName)) {
				require($fileName);
			} else {
				echo 'File not found: ' . $fileName;
				exit;
			}
		}
	});