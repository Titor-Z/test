<?php
require_once "../../../autoload.php";
use Qiniu\Auth;
function json(array $data=[]) {
    header("content-type: application/json");
    echo json_encode($data);
    return false;
}
$ak = 'ojK7kbKiCnEy2WWapI3Rhngwo1VC3-thaujdhrBA';
$sk = 'Q28Alpk8O_wIprE6o0rlhdsvYMEejAaDQlWsEfIx';
$bucket = 'soft';

$auth = new Auth($ak, $sk);
$token = $auth->uploadToken($bucket);

json([
    'token' => $token
]);
