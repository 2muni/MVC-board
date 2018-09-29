<div class="form">
	<p class="title">글수정 페이지</p>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="action" value="update">
		<label>
			<input type="text" name="writer" value="<?php echo $this->view->writer; ?>" readonly required>
		</label>
		<label>
			<input type="text" name="subject" placeholder="글제목" value="<?php echo $this->view->subject; ?>" required>
		</label>
		<label>
			<textarea name="content" placeholder="글내용" required><?php echo $this->view->content; ?></textarea>
		</label>
		<label>
			<input type="file" name="file">
		</label>
		<button type="submit" class="btn">글수정</button>
	</form>
	<a href=<?php echo _URL?> class="btn">메인으로</a>
</div>