<?php
  // http://php.net/manual/ja/function.file-get-contents.php
  $epsilon = file_get_contents("http://www.epsilon.jp/management/impediment.html");

  // http://php.net/manual/ja/class.domdocument.php
  $domDocument = new DOMDocument();
  $domDocument->loadHTML($epsilon);
  $xmlString = $domDocument->saveXML();
  $xmlObject = simplexml_load_string($xmlString);

  // http://php.net/manual/ja/function.json-decode.php
  // 第二引数 assoc が trueの場合連想配列になる
  $parsedEpsilonList = json_decode(json_encode($xmlObject), true);

  // 障害情報を取り出す
  echo("----------------いっこめ-----------------------------------\n");
  var_dump($parsedEpsilonList["body"]["table"][1]["tr"][1]);
  echo("----------------にこめ-----------------------------------\n");
  var_dump($parsedEpsilonList["body"]["table"][1]["tr"][2]);
  echo("----------------さんこめ-----------------------------------\n");
  var_dump($parsedEpsilonList["body"]["table"][1]["tr"][3]);
