<?php 
include_once('config.php');

try{
    $conn = new PDO("mysql:host={$config['server']};dbname={$config['dbname']}", 
    $config['user'],$config['pass']);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $conn;
}
catch(PDOException $ex)
{
    echo $ex->getMessage();
    exit;
}

?>