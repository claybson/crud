<?php 
include 'contatos.php';
$contato = new contato();

if(!empty($_GET['id'])){
	$id = $_GET['id'];
	$contato->excluir($id);
}

header('Location: index.php');