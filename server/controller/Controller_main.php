<?php
	/*
		server/controller/Controller_main.php

		controller 디렉토리의 진입점
		선언되지 않은 Controller를 상속하였으므로,
		autoload()가 수행되어 해당 객체를 불러온다.
	*/
	Class Controller_main extends Controller{

		// model의 게시글 리스트를 할당
		function basic(){
			$this->list = $this->model->getList();
		}
	}