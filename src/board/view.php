<div class="content">
	<div class="article-wrapper">
		<div class="article-title">
			<div class="article-content article-meta">
				<div class="article-subject"><?php echo $this->view->subject ?></div>
				<div class="article-date"><?php echo $this->view->date ?></div>
			</div>
			<div class="article-content article-option">
				<div class="article-property">
					<div class="article-comment"><i class="material-icons">comment</i>0</div>
					<div class="article-hit"><i class="material-icons">visibility</i><?php echo $this->view->hit ?></div>
				</div>
				<?php if (isset($_SESSION['member']) && $this->view->midx == $_SESSION['member']->idx): ?>
				<div class="article-btns">
					<a href="<?php echo _URL?>board/update/<?php echo $this->view->idx; ?>">수정</a>
					<a href="" onclick="if(confirm('삭제하시겠습니까?')) location.href='board/delete/<?php echo $this->view->idx; ?>'">삭제</a>
				</div>
				<?php endif ?>
			</div>
		</div>
		<div class="article-content article-main">
			<div class="divider"></div>
			<?php echo $this->view->content ?>
		</div>
	</div>
	<div class="article-wrapper article-author">
			<div class="article-content">
				<div class="article-writer"><?php echo $this->view->writer ?></div>
			</div>
		</div>
</div>
