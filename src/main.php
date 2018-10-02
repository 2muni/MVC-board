<div class="content">
	<ul class="collection">
		<?php foreach ($this->list as $data): ?>
			<li class="board-wrapper collection-item">
				<div class="board-title-wrapper">
					<div class="board-idx">#<?php echo $data->idx ?></div>
					<div class="board-subject"><a href="<?php echo _URL?>board/view/<?php echo $data->idx ?>"><?php echo $data->subject ?></a></div>
				</div>
				<div class="board-author-wrapper">
					<div class="board-writer"><?php echo $data->writer ?></div>
					<div class="board-date"><?php echo substr($data->date, 0,10) ?></div>
				</div>
			</li>
		<?php endforeach ?>
	</ul>
	
	<ul class='pagination'>
		<?php if( $this->model->start_page > 1 ): ?>
			<li class="waves-effect"><a href="<?php echo _URL."main/".$this->model->prev_page ?>"><i class="material-icons">chevron_left</i></a></li>
			<li class="waves-effect"><a href="<?php echo _URL."main/1" ?>">1</a></li>
			<li class="disabled">...</li>
		<?php else: ?>
			<li class="disabled"><i class="material-icons">chevron_left</i></li>
		<?php endif ?>

		<?php for( $p = $this->model->start_page; $p <= $this->model->end_page; $p++ ): ?>
			<li class="<?php echo ( $p == $this->model->page_num )?"active":"waves-effect" ?>"><a href="<?php echo _URL."main/".$p ?>"><?= $p ?></a></li>
		<?php endfor ?>

		<?php if( $this->model->end_page < $this->model->page_count ): ?>
			<li class="disabled">...</li>
			<li class="waves-effect"><a href="<?php echo _URL."main/".$this->model->page_count ?>"><?php echo $this->model->page_count ?></a></li>
			<li class="waves-effect"><a href="<?php echo _URL."main/".$this->model->next_page ?>"><i class="material-icons">chevron_right</i></a></li>
		<?php else: ?>
			<li class="disabled"><i class="material-icons">chevron_right</i><li class="disabled">
		<?php endif ?>
	</ul>

	<div class="btn-group">
		<?php if (isset($_SESSION['member'])): ?>
			<a href="<?php echo _URL?>board/write" class="btn">글작성</a>
		<?php endif ?>
	</div>
</div>