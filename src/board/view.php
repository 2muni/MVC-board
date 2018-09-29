<div class="content">
	<div id="article-wrapper">
		<div class="article-header">
			<div class="article-writer"><?php echo $this->view->writer ?></div>
			<div class="article-date"><?php echo $this->view->date ?></div>
			<div class="article-hit"><?php echo $this->view->hit ?></div>
		</div>
		<div class="article-title">
			<div class="article-idx">#<?php echo $this->view->idx ?></div>
			<div class="article-subject"><?php echo $this->view->subject ?></div>
		</div>
		<div class="article-main">
			<?php echo $this->view->content ?>
		</div>
		<?php if (isset($_SESSION['member']) && $this->view->midx == $_SESSION['member']->idx): ?>
			<a href="<?php echo _URL?>board/update/<?php echo $this->view->idx; ?>" class="btn">수정</a>
			<button onclick="if(confirm('삭제하시겠습니까?')) location.href='board/delete/<?php echo $this->view->idx; ?>'" class="btn">삭제</button>
		<?php endif ?>
	<a href=<?php echo _URL?> class="btn">메인으로</a>
	</div>
</div>
