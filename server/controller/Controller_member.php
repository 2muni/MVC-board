<?
	/*
		server/controller/Controller_member.php

		유저와 관련된 api controller
	*/
  Class Controller_member extends Controller{

		// 회원가입
		function join(){
			memberChk();
			if (isset($_POST['action'])) $this->model->process();
		}

		// 로그인
		function login(){
			memberChk();
			if (isset($_POST['action'])) {
				$a = $this->model->login();
				access($a == "","아이디 또는 비밀번호가 일치하지 않습니다.");
				$_SESSION['member'] = $a;
				move(_URL);
			}
		}

		// 로그아웃
		function logout(){
			loginChk();
			access(session_destroy(),"로그아웃 되었습니다.",_URL);
		}

		// 회원탈퇴
		// mypage에서 수행한 submit을 통해 signout을 전달받으면 탈퇴 수행
		function mypage(){
			loginChk();
			if (isset($_POST['signout'])){
				$this->model->memberDelete();	
				session_destroy();
				alert("회원탈퇴가 완료되었습니다.");
				move(_URL);
			} 
		}
  }