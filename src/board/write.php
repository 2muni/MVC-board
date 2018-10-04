<div class="content editor-wrapper">
  <div class="content-wrapper">
    <form id="write-form" action="" method="post" enctype="multipart/form-data">
  		<input type="hidden" name="action" value="insert">
		  <input type="hidden" name="midx" value="<?php echo $_SESSION['member']->idx ?>">
		  <label class="hidden-form">
  			<input type="text" name="writer" value="<?php echo $_SESSION['member']->name; ?>">
		  </label>
		  <label id="article-title-wrapper">
  			<input id="article-title" type="text" name="subject" placeholder="제목" required autofocus>
		  </label>
		  <label class="hidden-form">
  			<textarea id="article-content" name="content"></textarea>
		  </label>
		  <button id="submit" class="btn">작성</button>
	  </form>
    <div id="editSection"></div>
  </div>
</div>

<!--외부 편집기(UI-editor) 스크립트-->
<script>
  var editor = new tui.Editor({
    el: document.querySelector('#editSection'),
    previewStyle: 'vertical',
    height: '80vh',
    initialEditType: 'markdown'
  });
  var submit = document.querySelector('#submit');
  submit.addEventListener('click', function(){
    var result = editor.getHtml();
    document.querySelector('#article-content').value = result;
    document.querySelector('#write-form').submit();
  })
</script>