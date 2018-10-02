<?php
	Class Controller_main extends Controller{

		function basic(){
			$this->list = $this->model->getList();
		}
	}