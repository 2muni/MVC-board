<?php
	/*
		server/model/Model_board.php

		게시판과 관련된 DB model
	*/
	Class Model_board extends Model{

		// view 페이지 정보
		function getView(){
			
			// viewer 테이블을 참조하여 회원일 경우 조회수 증가
			if ($this->param->page == "view")
				$this->query("UPDATE board SET hit={$this->getHit()} where idx='{$this->param->idx}'");
			
			// 1차원 결과 배열 반환
			return $this->fetch("SELECT * FROM board where idx='{$this->param->idx}'");
		}

		// 페이지 삭제
		function delete(){
			$data = $this->getView();
			access($data->midx != $_SESSION['member']->idx,"작성자만 접근할 수 있습니다.");

			// 쿼리 수행
			$this->query("DELETE FROM board where idx='{$this->param->idx}'");
		}

		// 회원 여부에 따른 조회수 증가
		function getHit(){
			// 서브쿼리를 통해 유저와 게시글의 idx 값을 조회하여 viewer 테이블 갱신
			if(!$this->cnt("SELECT member_idx FROM (
				SELECT * FROM viewer where member_idx={$_SESSION['member']->idx} 
				)member where post_idx={$this->param->idx}")) {
					$this->query("INSERT INTO viewer SET post_idx='{$this->param->idx}',member_idx='{$_SESSION['member']->idx}'");
			}
			return $this->cnt("SELECT * FROM viewer where post_idx='{$this->param->idx}'");
		}

		// 클라이언트로부터 받은 데이터 처리
		function process(){
			$this->action = $_POST['action'];
			$this->table = "board";
			$cancel = "/action";
			$column = $this->get_column($_POST,$cancel);
			$add_sql = "";

			// 페이지 데이터
			$data = $this->getView();

			// action 유형에 따라 쿼리 문자열 추가
			switch ($this->action) {
				case 'insert':
					$add_sql .= ", date=now()";
				break;
				case 'update':
					$add_sql .= " where idx='{$this->param->idx}'";
				break;
			}
			$column .= $add_sql;
			access($this->get_query($column),"완료되었습니다.", _URL);
		}

	}