<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>회원제 게시판</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="<?php echo _CSS."common.css" ?>">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
	<header id="header">
		<nav id="gnb">
			<div id="logo">
				<i class="material-icons">menu</i>
				<a href="<?php echo _URL?>">회원제 게시판</a>
			</div>
			<ul>
				<?php if (isset($_SESSION['member'])): ?>
				<li><a class="waves-effect waves-light btn-flat" href="<?php echo _URL?>member/mypage"><?php echo $_SESSION['member']->name ?></a></li>
				<li><a class="waves-effect waves-light btn" href="<?php echo _URL?>member/logout">로그아웃</a></li>
				<?php else: ?>
				<li><a class="waves-effect waves-light btn" href="<?php echo _URL?>member/login">로그인</a></li>
				<?php endif ?>
			</ul>
		</nav>
	</header>