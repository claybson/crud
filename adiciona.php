<?php 
include 'contatos.php';
$contato = new Contato();

if(!empty($_POST['email'])){
	$email = $_POST['email'];
	$nome = $_POST['nome'];
	$contato->adicionar($email, $nome);
}

header('Location: index.php');
