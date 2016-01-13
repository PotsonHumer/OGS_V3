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
			$uri, #---- 本機相對位置
			$base, #--- 絕對(實體)根目錄
			$root, #--- 相對根目錄
			$file, #--- 檔案目錄
			$img, #---- 圖片目錄
			$tpl, #---- 樣板物件
			$db, #----- 資料庫物件
			$class, #-- 紀錄轉址 class
			$slash, #-- 系統目錄分隔字元
			$args; #--- 解析完成後參數

		function __construct(){
			self::$base = ROOT_PATH;
			self::$slash = DIRECTORY_SEPARATOR;
			self::$cfg = include(ROOT_PATH."config/basic.php");

			self::autoInclude();

			#self::$msg = include(ROOT_PATH."config/lang-{self::$root}.php");

			new ROUTER();
		}

		# 常駐程序
		private static function permanent(){

		}

		# 錯誤處理
		public function errorHandle($code,$msg,$file,$line,$context){
			$errorArgs = func_get_args();

			print_r($errorArgs);

			# Will go ERROR Class from here;
		}

		# 自動 include
		private static function autoInclude(){
			$file_filter = self::$cfg["filter"]["file"]; # 針對根目錄檔案的過濾器，寫入不要 inlcude 的檔案
			$folder_filter = self::$cfg["filter"]["dir"]; # 針對子目錄檔案的過濾器，寫入不要 inlcude 的目錄名稱
			$class_filter = self::$cfg["filter"]["class"]; # 針對功能目錄檔案的過濾器，寫入不要 inlcude 的目錄名稱
			
			# include 檔案
			$files = glob(self::$base.'*.php');
			foreach($files as $f_key => $f_path){
				$f_name = str_replace(self::$base, '', $f_path);
				$f_name = str_replace('.php', '', $f_name);
				
				if(!in_array($f_name,$file_filter)){
					include_once $f_path;
				}
			}
			
			# include 目錄內檔案
			# 目錄內如有 summon.php, auto_include 會在此 include
			$dirs = glob(self::$base.'*', GLOB_ONLYDIR);
			foreach($dirs as $d_key => $d_path){
				$d_name = str_replace(self::$base, '', $d_path);
				$summon = file_exists($d_path.self::$slash.'summon.php');

				if(!in_array($d_name,$folder_filter) && $summon){
					include_once $d_path.self::$slash.'summon.php';
				}
			}
			
			# class include
			$class_dirs = glob(self::$base.'class/*', GLOB_ONLYDIR);
			foreach($class_dirs as $c_key => $c_path){
				$c_name = str_replace(self::$base.'class/', '', $c_path);
				$class = file_exists($c_path.self::$slash.'index.php');
				
				if(!in_array($c_name,$class_filter) && $class){
					include_once $c_path.self::$slash.'index.php';
				}
			}
		}

		# summon include
		public static function summon($summon=__FILE__){

			$now_path_array = explode("/",$summon);
			$now_file_name = array_pop($now_path_array);

			$self_path = self::real_path($summon);

			$file_array = glob($self_path.'*.php');
			if(is_array($file_array) && count($file_array) > 1){
				foreach($file_array as $file_key => $file_path){
					if(!preg_match('/(summon.php|'.$now_file_name.')/',$file_path)){
						include_once $file_path;
					}
				}
			}
		}

		# 系統訊息
		public static function msg($msg=false,$redirect=false,$sec=2){
			if(is_array($msg) && count($msg) == "2"){
				$msg_array = $msg;
				$msg = $msg_array[0];
				$redirect = $msg_array[1];
			}

			if(!empty($msg)){
				VIEW::assignGlobal("TAG_MSG",$msg);
			}

			if(!empty($redirect)){
				header("Refresh: {$sec}; url={$redirect}");
			}
		}

		# 取得 IP
		public static function getIP(){
			if(!empty($_SERVER['HTTP_CLIENT_IP'])){
				$IP = $_SERVER['HTTP_CLIENT_IP'];
			}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
				$IP = $_SERVER['HTTP_X_FORWARDED_FOR'];
			}else{
				$IP = $_SERVER['REMOTE_ADDR'];
			}

			return $IP;
		}
	}

?>