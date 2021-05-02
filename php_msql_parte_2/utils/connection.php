<?php

$debug = true;
/* retornando erro do mysql para 'debugar'
    MYSQLI_REPORT_ERROR
    MYSQLI_REPORT_OFF
    MYSQLI_REPORT_STRICT
    MYSQLI_REPORT_INDEX
    MYSQLI_REPORT_ALL
*/
if($debug){
    mysqli_report(MYSQLI_REPORT_ERROR);
}else {
    mysqli_report(MYSQLI_REPORT_OFF);
}

$conn = new mysqli('localhost', 'root', '123456', 'php_msql_parte_2');

if($conn->connect_errno){
    die('Falha em connectar: (' . $conn->connect_errno .  ')' . $conn->connect_error);
}

return $conn;