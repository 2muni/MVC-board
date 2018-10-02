<?php
  /* 상수정의 */
 
  define("_ROOT", __DIR__."/");
  define("_PUBLIC", _ROOT."public/");
  define("_SERVER", _ROOT."server/");
  define("_LIB", _SERVER."lib/");
  define("_MODEL", _SERVER."model/");
  define("_CTR", _SERVER."controller/");
  define("_CLIENT", _ROOT."src/");
    
  //url 정의
 
  define('_URL', str_replace("index.php", "", "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}"));
  define("_CSS", _URL."public/css/");
  define("_JS", _URL."public/js/");
    
  //config.php 불러옴, autoload 실행
  require_once(_LIB."lib.php");

  new Server();