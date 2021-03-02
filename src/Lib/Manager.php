<?php

namespace SilentBot\Lib;

use SilentBot\Lib\Database;

Class Manager
{
	public static function loadFwdList() {
		$result = [];
		if(DB_USEDB) {
			$conn = new Database();
			$result = $conn->execute('select * from forwards');
			$result = [];
		} else {
			$file = dirname(__DIR__, 2).FORWARD_PATH.FORWARD_FILE;
			$list = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
			
			foreach($list as $val) {
				$val = explode(',', $val);
				$result[] = [
					'from' => $val[0],
					'to' => $val[1]
				];
			}
		}
		
		return $result;
	}
}