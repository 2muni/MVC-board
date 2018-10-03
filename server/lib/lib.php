<?php
	/*
		server/lib/lib.php

		라이브러리 함수를 정의하고, autoload를 통해 라우팅을 지원한다
	*/

	//세선 스타트
	session_start();

	//경고창
	function alert($msg){
		echo "<script>alert('{$msg}');</script>";
	}

	//페이지 이동
	function move($url = false){
		echo "<script>";
			echo $url ? "location.href='{$url}'" : "history.back();";
		echo "</script>";
		exit;
	}

	//조건문,경고창,페이지 이동
	function access($bool,$msg,$url = false){
		if ($bool) {
			alert($msg);
			move($url);
		}
	}

	//비회원이면 뒤로
	function loginChk(){
		access(!isset($_SESSION['member']),"회원만 접근 가능합니다.");
	}

	//회원이면 뒤로
	function memberChk(){
		access(isset($_SESSION['member']),"이미 로그인 하셨습니다.");
	}

	/*
		__autoload();

		정의되지 않는 객체가 생성되었을 때 자동으로 실행되는 함수.
		해당 함수의 매개변수 값은, 생성되는 객체의 이름이 할당된다.
	*/
	function __autoload($className){
		$className = strtolower($className);
		$className2 = preg_replace("/(model|server)(.*)/", "$1", $className);

		// 객체 이름에 model이나 server가 포함되어 있으면 해당 디렉토리로 이동,
		// 그 외는 controller로 이동
		switch ($className2) {
			case 'model': $dir = _MODEL; break;
			case 'server': $dir = _SERVER; break;
			default: $dir = _CTR; break;
		}

		// 파일이 존재하지 않으면 history.back();
		access(file_exists("{$dir}{$className}.php") == "", "비정상적인 접근입니다!");

		// 해당 파일을 불러온다
		require_once("{$dir}{$className}.php");
	}