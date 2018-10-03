<?php
	/*
		server/controller/Controller_board.php

		게시판과 관련된 api controller
	*/
	Class Controller_board extends Controller{

		//글작성 페이지
		function write(){
			loginChk();
			if (isset($_POST['action'])) $this->model->process();
		}

		//글보기 페이지
		function view(){
			loginChk();
			$this->view = $this->model->getView();
			access($this->view == "","존재하지 않는 페이지 입니다.");
		}

		//글수정 페이지
		function update(){
			loginChk();
			$this->view();
			$this->write();
			access($this->view->midx != $_SESSION['member']->idx,"작성자만 접근할 수 있습니다.");
		}

		//글 삭제
		function delete(){
			loginChk();
			$this->model->delete();
			alert("삭제되었습니다.");
			move(_URL);
		}

	}