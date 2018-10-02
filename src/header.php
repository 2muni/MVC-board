<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>회원제 게시판</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="<?php echo _CSS."common.css" ?>">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="<?php echo _JS."common.js" ?>"></script>
</head>
<body>
	<header id="header">
		<div id="gnb">
			<div id="logo">
				<a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
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
</div>
		
		<ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <a href="#name"><span class="white-text name">John Doe</span></a>
      <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
    </div></li>
    <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
    <li><a href="#!">Second Link</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Subheader</a></li>
    <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
  </ul>
  

	</header>