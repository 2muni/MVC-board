<?php
  /*
    index.php

    URL 진입점에 해당하며, 역할은 다음과 같다.
    1. php 상수 정의
    2. 라이브러리(lib.php) 로딩
    3. Server 객체 생성
      
    선언되지 않은 객체의 생성에 관한 처리는 
    lib.php 내부의 autoload() 함수를 통해 처리된다.
  */
  
  //상수 정의
  define("_ROOT", __DIR__."/");
  define("_SERVER", _ROOT."server/");
  define("_LIB", _SERVER."lib/");
  define("_MODEL", _SERVER."model/");
  define("_CTR", _SERVER."controller/");
  define("_CLIENT", _ROOT."src/");
    
  //url 정의
  define('_URL', str_replace("index.php", "", "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}"));
  define("_PUBLIC",_URL."public/");
  define("_CSS", _PUBLIC."css/");
  define("_JS", _PUBLIC."js/");
    
  //config.php 불러옴, autoload 실행
  require_once(_LIB."lib.php");

  new Server();