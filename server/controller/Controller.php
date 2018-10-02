<?php
	Class Controller{

		function __construct(){//getParam 주소 가져옴,모델 require
			$this->param = Server::getParam();
			$model = "Model_{$this->param->type}";
			$this->model = new $model();
			$this->index();
		}

		//페이지 로드
		function index(){
			//$this->param->page 와 일치하는 함수가 있으면 그 함수 실행
			$method = isset($this->param->page) ? $this->param->page : "basic";
			if (method_exists($this, $method)) $this->$method(); //$this->param->page에 맞게 함수 실행
			$this->header();
			$this->content();
			$this->footer();
		}

		function header(){
			include_once(_CLIENT."header.php");
		}
		
		function content(){
			if ($this->param->type !== "main" && isset($this->param->page)) {
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