<?php


class WSUNewsTheme {
	public static function init() {

		require_once __DIR__ . '/post-status.php';
        require_once __DIR__ . '/scripts.php';
        require_once __DIR__ . '/archive-cron.php';
	}

}

WSUNewsTheme::init();
