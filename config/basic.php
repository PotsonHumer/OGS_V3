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

		'rootPath' => 'V3',
		'filePath' => 'update_files',
		'imgPath' => 'images',
		'jsPath' => 'js',
	);

?>