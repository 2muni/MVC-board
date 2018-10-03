<?php
	/*
		server/server.php

		주소열에 할당되는 문자열인 $_GET['param'] 값을 통해
		Controller 객체를 생성하고 라우팅을 수행한다.
	*/
	Class Server{

		// Controller 객체 생성
		function __construct(){

			/*
				아래 선언된 getParam() 함수를 통해 반환된 객체의 type 프로퍼티 값에 따라
				php 파일 명을 할당하고 해당 파일을 autoload를 이용하여 불러온다.
			*/
			$ctr = "Controller_{$this->getParam()->type}";
			new $ctr();
		}

		/*
			주소열의 값을 분리하여 각각의 변수에 할당하고
			해당 값들을 가지는 $param 객체를 반환

			각각의 값 유형은 다음과 같다.
			{
				type: 클라이언트에서 접근한 페이지의 타입
				page_num: main 페이지에서 수행한 페이지네이션에 따른 페이지 넘버
				page: 클라이언트에서 접근한 페이지
				idx: 게시글 인덱스
			}
		*/
		function getParam(){

			if(isset($_GET['param'])) $get = explode("/", $_GET['param']);

			// 초기값을 main으로 할당하여 각 디렉토리의 진입점으로 이동
			$param['type'] = isset($get[0]) && $get[0] != "" ? $get[0] : "main";
			
			// page_num은 main 페이지에서만 할당
			$param['page_num'] = isset($get[1]) && $get[1] != "" && $param['type'] == "main" ? intval($get[1]) : "1";
			if($param['page_num'] < 1) $param['page_num'] = 1;
			$param['page'] = isset($get[1]) && $get[1] != "" && $param['type'] !== "main" ? $get[1] : NULL;

			$param['idx'] = isset($get[2]) && $get[2] != "" ? $get[2] : NULL;

			return (object)$param;
		}

	}