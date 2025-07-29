<?php
	$cookieName = "test";
	$cookieValue = "How are you, where dou live?";
	$expire = time() + 3600;
	$path = "/";
	$domain = "localhost";
	$secure = false;
	$httpOlny = true;

	setcookie(
		$cookieName,
		$cookieValue,
		$expire,
		$path,
		$domain,
		$secure,
		$httpOlny
	);