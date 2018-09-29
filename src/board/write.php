<div class="form">
	<p class="title">글작성 페이지</p>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="action" value="insert">
		<input type="hidden" name="midx" value="<?php echo $_SESSION['member']->idx ?>">
		<label>
			<input type="text" name="writer" value="<?php echo $_SESSION['member']->name; ?>" readonly required>
		</label>
		<label>
			<input type="text" name="subject" placeholder="글제목" required>
		</label>
		<label>
			<textarea name="content" cols="30" rows="10" placeholder="글내용" required></textarea>
		</label>
		<button type="submit" class="btn">글작성</button>
	</form>
	<a href=<?php echo _URL?> class="btn">메인으로</a>
</div>