<?php
//$key = $_GET['key'];
//$ip = $_GET['ip'];
//$port = $_GET['port'];
//
//if ($key !== "aguspedhot") {
//    $jsonError = [
//        'ip' => 'Invalid Api Key',
//        'port' => 'Invalid Api Key'
//    ];
//    echo json_encode($jsonError);
//}else{
//    $infoArray = [
//        'ip' => $ip,
//        'port' => $port,
//        'info' => [
//            'ip' => $ip,
//            'port' => $port
//        ]
//    ];
//    echo json_encode($infoArray);
//}
$ip = $_GET['ip'];
$port = $_GET['port'];

require __DIR__ . "/src/libpmquery/PMQuery.php";
require __DIR__ . "/src/libpmquery/PmQueryException.php";

try {
    $query = \libpmquery\PMQuery::query($ip, $port);
    $players = $query['Players'];
    $maxplayers = $query['MaxPlayers'];
    $hostname = $query['HostName'];
    $version = $query['Version'];
    $gamename = $query['GameName'];
    $gamemode = $query['GameMode'];
    $map = $query['Map'];

    $array = [
        'address' => $ip,
        'port' => $port,
        'hostname' => $hostname,
        'players' => $players,
        'maxplayers' => $maxplayers,
        'version' => $version,
        'gamename' => $gamename,
        'map' => $map,
        'gamemode' => $gamemode
    ];
    echo json_encode($array);
}catch (\libpmquery\PmQueryException $exception) {
    $e = $exception;
    echo "Error: Invalid IP and PORT";
}

?>