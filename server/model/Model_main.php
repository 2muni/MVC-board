<?php
	Class Model_main extends Model{

		function getList(){
			$this->LIST_SIZE = 6;
			$this->MORE_PAGE = 3;

			$this->page_num = $this->param->page_num;
			$this->page_count = $this->fetch("SELECT CEIL( COUNT(*)/$this->LIST_SIZE ) as cnt FROM board")->cnt;
			$this->start_page = max($this->page_num - $this->MORE_PAGE, 1);
			$this->end_page = min($this->page_num + $this->MORE_PAGE, $this->page_count);
			$this->prev_page = max($this->start_page - $this->MORE_PAGE - 1, 1);
			$this->next_page = min($this->end_page + $this->MORE_PAGE + 1, $this->page_count);

			$this->offset = ( $this->page_num - 1 ) * $this->LIST_SIZE;

			return $this->fetchAll("SELECT * FROM board ORDER BY idx DESC LIMIT $this->offset, $this->LIST_SIZE");
		}

	}