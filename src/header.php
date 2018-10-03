<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>게시판</title>
<script src="<?php echo _PUBLIC ?>bower_components/jquery/dist/jquery.js"></script>
<script src="<?php echo _PUBLIC ?>bower_components/markdown-it/dist/markdown-it.js"></script>
<script src="<?php echo _PUBLIC ?>bower_components/to-mark/dist/to-mark.js"></script>
<script src="<?php echo _PUBLIC ?>bower_components/tui-code-snippet/dist/tui-code-snippet.js"></script>
<script src="<?php echo _PUBLIC ?>bower_components/codemirror/lib/codemirror.js"></script>
<script src="<?php echo _PUBLIC ?>bower_components/highlightjs/highlight.pack.js"></script>
<script src="<?php echo _PUBLIC ?>bower_components/squire-rte/build/squire-raw.js"></script>
<script src="<?php echo _PUBLIC ?>bower_components/tui-editor/dist/tui-editor-Editor.js"></script>
<link rel="stylesheet" href="<?php echo _PUBLIC ?>bower_components/codemirror/lib/codemirror.css">
<link rel="stylesheet" href="<?php echo _PUBLIC ?>bower_components/highlightjs/styles/github.css">
<link rel="stylesheet" href="<?php echo _PUBLIC ?>bower_components/tui-editor/dist/tui-editor.css">
<link rel="stylesheet" href="<?php echo _PUBLIC ?>bower_components/tui-editor/dist/tui-editor-contents.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="<?php echo _CSS ?>github-markdown.css">
<link rel="stylesheet" href="<?php echo _CSS ?>common.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="<?php echo _PUBLIC ?>bower_components/highlightjs/highlight.pack.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
</head>
<body>
<?php if($this->param->page !== "join" && $this->param->page !== "login"):?>
	<header id="header">
		<div id="gnb-wrapper">
			<div id="gnb">
				<div id="logo">
					<a href="#" id="sidenav-trigger"><i class="material-icons">menu</i></a>
					<a href="<?php echo _URL?>">게시판</a>
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
		</div>
		<ul class="sidenav">
	    <li><div class="user-view">
			</div></li>
			<?php if(isset($_SESSION['member'])): ?>
			<li><a class="subheader">프로필 편집</a></li>
			<li><a class="waves-effect" href="<?php echo _URL?>member/mypage"><?php echo $_SESSION['member']->name ?></a></li>
			<?php else: ?>
			<li><a class="subheader">로그인이 필요합니다.</a></li>
			<?php endif ?>
    	<li><div class="divider"></div></li>
    	<li><a class="subheader">카테고리</a></li>
			<li><a class="waves-effect" href="#!">First Link With Waves</a></li>
			<li><a class="waves-effect" href="#!">Second Link With Waves</a></li>
			<li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
		</ul>
	</header>
<? endif ?>