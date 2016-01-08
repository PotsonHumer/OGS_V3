<?php

	# CORE

	class CORE{

		public static 
			$cfg, #---- 基本設定
			$defined, # 預設定義
			$languge, # 目前語系
			$prefix, #- 資料庫前綴
			$msg, #---- 語言定義
			$url, #---- 本機網址
			$base, #--- 絕對(實體)根目錄
			$root, #--- 相對根目錄
			$file, #--- 檔案目錄
			$img, #---- 圖片目錄
			$tpl, #---- 樣板物件
			$db; #----- 資料庫物件

		function __construct(){
			self::$base = ROOT_PATH;
			self::$cfg = include(ROOT_PATH.'config/basic.php');
		}

		public function errorHandle($code,$msg,$file,$line,$context){
			$errorArgs = func_get_args();
			array_pop($errorArgs);
			var_dump($errorArgs);
		}
	}

?>