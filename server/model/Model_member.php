<?php
	/*
		server/model/Model_member.php

		유저와 관련된 DB model
	*/
	Class Model_member extends Model{

		// 아이디 확인
		function idChk(){
			return $this->cnt("SELECT * FROM member where id='{$_POST{'id'}}'");
		}

		// 로그인 수행
		function login(){
			return $this->fetch("SELECT * FROM member where id='{$_POST['id']}' and pw='{$_POST['pw']}'");
		}

		// 회원 탈퇴, 게시글 삭제 수행
		function memberDelete(){
			return $this->query("
				DELETE FROM member where idx='{$_POST['signout']}';
				DELETE FROM board where midx='{$_POST['signout']}';
			");
		}

		// 클라이언트로부터 받은 데이터 처리
		function process(){
			$this->action = $_POST['action'];
			$this->table = "member";
			$cancel = "/action";
			$add_sql = "";
			access($this->idChk() != 0,"중복된 아이디 입니다.");
			$column = $this->get_column($_POST,$cancel);
			$add_sql .= ", date=now()";
			$column .= $add_sql;
			access($this->get_query($column),"회원가입이 완료되었습니다.", _URL);
		}

	}