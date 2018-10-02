<div class="content editor-wrapper">
  <div id="editSection"></div>
  <button id="mybutton">Click me to set content programmatically</button>
</div>


<script>
  var editor = new tui.Editor({
    el: document.querySelector('#editSection'),
    previewStyle: 'vertical',
    height: '80vh',
    initialEditType: 'markdown'
  });
  
  var el = document.querySelector('#mybutton');
  el.addEventListener('click', function(){
    alert(editor.getHtml());
  })
</script>