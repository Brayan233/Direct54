<?php
global $connect;
$connect = new PDO('mysql:host=185.98.131.90;dbname=direc983737;charset=utf8', 'direc983737', '50kzzhcc5l');
$connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (!isset($_SESSION)){
    session_start();
}