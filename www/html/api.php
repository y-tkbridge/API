<?php


/* スタブAPIが受け付けるPOSTパラメーター：name */

header('Access-Control-Allow-Origin: *'); // どこからでもアクセス許可するならワイルドカード
// header('Access-Control-Allow-Credentials: true'); // Basic認証やCookieのやり取りする際は必要（ワイルドカード使用すると使えない）

header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json; charset=utf-8');

date_default_timezone_set('Asia/Tokyo');
// if(isset($_POST['name']) === false || $_POST['name'] === '') {
//     $_POST['text'] = 'TEST_API';
// }

$request_body = file_get_contents('php://input'); //送信されてきたbodyを取得(JSON形式）
$data = json_decode($request_body,true); // デコード
$array = [
    'name' => $data['name'] . '_RECEIVED', // API側で受け取ったよというマーク的なやつを付加
    'date' => date("Y-m-d H:i:s"),
];

$json = json_encode($array);

/* logをAPI側のサーバーに出力する */
$file = new SplFileObject('log.txt', 'a');
$file->fwrite(
    "【→API】RequestParameter:" . $postName . "'\n【←API】ReturnParameter :" . $json . "\n----------\n"
);
var_dump($_POST);
echo $json;
exit;