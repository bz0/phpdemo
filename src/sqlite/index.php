<?php
try {
    // 接続
    $pdo = new PDO('sqlite:'.__DIR__.'/../ex1.db');

    // SQL実行時にもエラーの代わりに例外を投げるように設定
    // (毎回if文を書く必要がなくなる)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // デフォルトのフェッチモードを連想配列形式に設定 
    // (毎回PDO::FETCH_ASSOCを指定する必要が無くなる)
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // 選択 (プリペアドステートメント)
    $stmt = $pdo->prepare("SELECT * FROM `blog`");
    $stmt->execute();
    $r1 = $stmt->fetchAll();

    // 結果を確認
    var_dump($r1);

} catch (Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}