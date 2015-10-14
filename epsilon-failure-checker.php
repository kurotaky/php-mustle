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

  // 障害情報を3こ取り出す
  echo("\n----------------1こめ-----------------------------------\n");
  echo("発生時刻: \n");
  echo($parsedEpsilonList["body"]["table"][1]["tr"][1]["td"][1]);
  echo("\n\n");
  echo("対象サービス: \n");
  echo(str_replace("\n", "", $parsedEpsilonList["body"]["table"][1]["tr"][1]["td"][2]));
  echo("\n\n");
  echo("詳細: \n");
  echo($parsedEpsilonList["body"]["table"][1]["tr"][1]["td"][3]);
  echo("\n-------------------2こめ--------------------------------\n");
  echo("発生時刻: \n");
  echo($parsedEpsilonList["body"]["table"][1]["tr"][2]["td"][1]);
  echo("\n\n");
  echo("対象サービス: \n");
  echo(str_replace("\n", "", $parsedEpsilonList["body"]["table"][1]["tr"][2]["td"][2]));
  echo("\n\n");
  echo("詳細: \n");
  echo($parsedEpsilonList["body"]["table"][1]["tr"][2]["td"][3]);
  echo("\n-------------------3こめ--------------------------------\n");
  echo("発生時刻: \n");
  echo($parsedEpsilonList["body"]["table"][1]["tr"][3]["td"][1]);
  echo("\n\n");
  echo("対象サービス: \n");
  echo(str_replace("\n", "", $parsedEpsilonList["body"]["table"][1]["tr"][3]["td"][2]));
  echo("\n\n");
  echo("詳細: \n");
  echo($parsedEpsilonList["body"]["table"][1]["tr"][3]["td"][3]);
