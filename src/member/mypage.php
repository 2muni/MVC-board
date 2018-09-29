<div class="content">
	<p class="title">마이 페이지</p>
	<table class="table">
		<colgroup>
			<col>
			<col>
		</colgroup>
		<tbody>
			<tr>
				<td>아이디</td>
				<td><?php echo $_SESSION['member']->id ?></td>
			</tr>
			<tr>
				<td>이름</td>
				<td><?php echo $_SESSION['member']->name ?></td>
			</tr>
			<tr>
				<td>회원 가입일</td>
				<td><?php echo $_SESSION['member']->date ?></td>
			</tr>
		</tbody>
	</table>
	<form action="" method="post" id="memberDelete">
		<input type="hidden" name="idx" value="<?php echo $_SESSION['member']->idx ?>">
		<button type="submit" class="btn">회원탈퇴</button>
	</form>
</div>