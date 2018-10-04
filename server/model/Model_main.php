<?php
	/*
		server/model/Model_main.php

		model 디렉토리의 진입점
		board table의 데이터를 읽어와 페이지네이션을 수행
		선언되지 않은 Model를 상속하였으므로,
		autoload()가 수행되어 해당 객체를 불러온다.
	*/
	Class Model_main extends Model{

		function getList(){
			$this->LIST_SIZE = 15;
			$this->MORE_PAGE = 4;

			$this->page_num = $this->param->page_num;
			$this->page_count = $this->fetch("SELECT CEIL( COUNT(*)/$this->LIST_SIZE ) as cnt FROM board")->cnt;
			if($this->page_num > $this->page_count) $this->page_num = $this->page_count;

			$this->start_page = max($this->page_num - $this->MORE_PAGE, 1);
			$this->end_page = min($this->page_num + $this->MORE_PAGE, $this->page_count);
			
			$this->prev_page = max($this->start_page - $this->MORE_PAGE * 2 - 1, 1);
			$this->next_page = min($this->end_page - 1, $this->page_count);

			$this->offset = ( $this->page_num - 1 ) * $this->LIST_SIZE;

			return $this->fetchAll("SELECT * FROM board ORDER BY idx DESC LIMIT $this->offset, $this->LIST_SIZE");
		}

	}