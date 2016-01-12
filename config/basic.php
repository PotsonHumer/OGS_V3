<?php

	# 基本設定

	return array(
		'db' => array(
			'locate' => 'localhost', # 資料庫位置
			'name' => 'ogs_v3', # 資料庫名稱
			'user' => '', # 使用者
			'password' => '', # 密碼
		),

		'dir' => array(
			'' => array('languge' => 'eng','langugeTag' => 'eng'),
			#'tw' => array('languge' => 'cht','langugeTag' => 'cht'),
			#'cn' => array('languge' => 'cht','langugeTag' => 'chs'),
			#'jp' => array('languge' => 'jap','langugeTag' => 'jap'),
		),

		'filter' => array(
			'file' => array('index','core'), # 針對根目錄檔案的過濾器，寫入不要 inlcude 的檔案
			'dir' => array(), # 針對子目錄檔案的過濾器，寫入不要 inlcude 的目錄名稱
			'class' => array(), # 針對功能目錄檔案的過濾器，寫入不要 inlcude 的目錄名稱
		),
	);

?>