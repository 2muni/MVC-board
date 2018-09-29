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
	<ul class="pagination">
    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
    <li class="active"><a href="#!">1</a></li>
    <li class="waves-effect"><a href="#!">2</a></li>
    <li class="waves-effect"><a href="#!">3</a></li>
    <li class="waves-effect"><a href="#!">4</a></li>
    <li class="waves-effect"><a href="#!">5</a></li>
    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
  </ul>
	<div class="btn-group">
		<?php if (isset($_SESSION['member'])): ?>
			<a href="<?php echo _URL?>board/write" class="btn">글작성</a>
		<?php endif ?>
	</div>
</div>