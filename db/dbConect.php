<?php 
$host = 'localhost';
$user = 'root';
$pass = '';
$banco = 'loja';

$conn = new mysqli($host, $user, $pass, $banco);

if ($conn->connect_error){
    die("Conexão falhou: " . $conn->connect_error);
}
?>