<div id="auth-wrapper">
	<div class="auth-form">
		<p class="title">환영합니다</p>
		<form action="" method="post">
			<input type="hidden" name="action" value="insert">
    	<div class="input-field">
	      <input id="id" name="id" type="text" class="validate" required autofocus>
        	<label for="id">아이디</label>
    	</div>
    	<div class="input-field">
	      <input id="pw" name="pw" type="password" class="validate" required>
      	<label for="pw">비밀번호</label>
    	</div>
    	<div class="input-field">
	      <input id="name" name="name" type="text" class="validate" required>
      	<label for="name">이름</label>
    	</div>
			<button type="submit" class="btn">회원가입</button>
		</form>
	</div>
	<div class="auth-options">
		계정이 있으신가요?<a href="<?php echo _URL?>member/login"> 로그인하기</a>
	</div>
</div>