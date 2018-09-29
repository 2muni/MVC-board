<?php
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

	//정의되지 않는 객체가 생성되었을 때 자동으로 실행
	function __autoload($className){
		$className = strtolower($className);
		$className2 = preg_replace("/(model|server)(.*)/", "$1", $className);
		switch ($className2) {
			case 'model': $dir = _MODEL; break;
			case 'server': $dir = _SERVER; break;
			default: $dir = _CTR; break;
		}
		require_once("{$dir}{$className}.php");
	}