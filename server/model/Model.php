<?php
	/*
		server/model/Model.php

		model 디렉토리의 부모 클래스
		PDO 객체를 생성하여 DB를 연결하고
	*/
	Class Model{
		
		function __construct(){//db연결
			$this->param = Server::getParam();
			$this->db = new PDO("mysql:host=localhost;dbname=myproject;charset=utf8;","root","");
			$this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // DB 정보를 object형식으로 반환
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

		// 쿼리문 실행
		protected function query($sql = false){
			try{
				if ($sql) $this->sql = $sql;
				return $this->db->query($this->sql);
			}catch (PDOException $e) {
				exit($e->getMessage());
			}
		}

		// 1차원 결과배열 반환
		protected function fetch($sql = false){
			if ($sql) $this->sql = $sql;
			return $this->query()->fetch();
		}

		// 2차원 결과배열 반환
		protected function fetchAll($sql = false){
			if ($sql) $this->sql = $sql;
			return $this->query()->fetchAll();
		}

		// row 갯수 반환
		protected function cnt($sql = false){
			if ($sql) $this->sql = $sql;
			return $this->query()->rowCount();
		}

		// 데이터를 set 쿼리문에 적합한 문자열로 변환
		protected function get_column($arr,$cancel){
			$cancel = explode("/", $cancel);
			$column = "";
			// $key 값과 $val 값을 대응하여 문자열 저장
			foreach ($arr as $key => $val) {
				// action 형태는 저장하지 않음
				if (!in_array($key, $cancel)) {
					$column .= ", {$key}='{$val}'";
				}
			}
			return substr($column, 2);
		}

		// action의 value값에 따라 쿼리문 변경
		protected function get_query($column){
			switch ($this->action) {
				case 'insert':
					$sql = "INSERT INTO {$this->table} SET ";
				break;
				case 'update':
					$sql = "UPDATE {$this->table} SET ";
				break;
				case 'delete':
					$sql = "DELETE FROM {$this->table} ";
				break;
			}
			$sql .= $column;
			return $this->query($sql);
		}

	}