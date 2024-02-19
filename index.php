<?php
session_start();
include "./templates/index.html";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['formName'] == 'selectIpAddress') {
    $ipAddress = $_POST['ipAddress'];
    $port = $_POST['port'];
    $peerId = $_POST['peerId'];
    $mask = $_POST['mask'];

    $_SESSION['port'] = $port;
    $_SESSION['ipAddress'] = $ipAddress;
    $_SESSION['peerId'] = $peerId;
    $_SESSION['mask'] = $mask;

    header('Location: chat.php');
}