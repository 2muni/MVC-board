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
	
	<div class='pagination'>
	<?php if( $this->model->start_page > 1 ): ?>
	<a class='move_btn' href="<?php echo _URL."main/".$this->model->prev_page ?>">« 이전</a>
	<a class='pagenum' href="<?php echo _URL."main/1" ?>">1</a> ...
	<?php else: ?>
	<span class='move_btn disabled'>« 이전</span>
	<?php endif ?>

	<?php for( $p = $this->model->start_page; $p <= $this->model->end_page; $p++ ): ?>
	<a class='pagenum <?php echo ( $p == $page )?"current":"" ?>' href="<?php echo _URL."main/".$p ?>">
		<?= $p ?>
	</a>
	<?php endfor ?>

	<?php if( $this->model->end_page < $this->model->page_count ): ?>
	... <a class='pagenum' href="<?php echo _URL."main/".$this->model->page_count ?>"><?php echo $this->model->page_count ?></a>
	<a class='move_btn' href="<?php echo _URL."main/".$this->model->next_page ?>">다음 »</a>
	<?php else: ?>
	<span class='move_btn disabled'>다음 »</span>
	<?php endif ?>
</div>

	<div class="btn-group">
		<?php if (isset($_SESSION['member'])): ?>
			<a href="<?php echo _URL?>board/write" class="btn">글작성</a>
		<?php endif ?>
	</div>
</div>