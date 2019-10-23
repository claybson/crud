<?php 
include 'contatos.php';
$contato = new Contato();

if(!empty($_POST['id'])){
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$email = $_POST['email'];

	$contato->editar($id, $email, $nome);
}

header('Location: index.php');