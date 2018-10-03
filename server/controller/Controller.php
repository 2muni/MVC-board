<?php
	/*
		server/controller/Controller.php

		controller 디렉토리의 부모 클래스
		공통적으로 수행되어지는 함수를 정의하고 페이지를 로드한다.
	*/
	Class Controller{

		// server.php의 getParam() 함수를 통하여 $param을 가져오고
		// $param[type]의 값에 맞는 model을 불러온다
		function __construct(){
			$this->param = Server::getParam();
			$model = "Model_{$this->param->type}";
			$this->model = new $model();
			$this->index();
		}

		//페이지 로드
		function index(){
			/*
				method_exists();

				클래스 내에 동일한 이름을 가진 함수가 존재하면 해당 함수를 수행한다.
				여기서는 $this->param->page의 값과 일치하는 함수가 있으면 해당 함수 수행
			*/
			$method = isset($this->param->page) ? $this->param->page : "basic";
			if (method_exists($this, $method)) $this->$method();

			$this->header();
			$this->content();
			$this->footer();
		}

		function header(){
			include_once(_CLIENT."header.php");
		}
		
		function content(){
			if ($this->param->type !== "main" && isset($this->param->page)) {
				// main 이외의 페이지를 불러오고 예외처리 수행
				access(file_exists(_CLIENT."{$this->param->type}/{$this->param->page}.php") == "", "비정상적인 접근입니다!");
				include_once(_CLIENT."{$this->param->type}/{$this->param->page}.php");
			} else{
				include_once(_CLIENT."main.php");
			}
		}

		function footer(){
			include_once(_CLIENT."footer.php");
		}

	}