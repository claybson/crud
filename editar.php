<?php 
include 'contatos.php';
$contato = new Contato();

	if(!empty($_GET['id'])){
		$id = $_GET['id'];
		$info = $contato->getInfo($id);

		if(empty($info['email'])){
			header("Location: index.php");
			exit;
		}
	}else {
		header("Location: index.php");
		exit;
	}
?>

<form method="POST" action="editar_submit.php">
	<input type="hidden" name="id" value="<?php echo $info['id'];?>">
	<label>NOME</label><br>
	<input type="text" name="nome" value="<?php echo $info['nome'];?>"> <br><br>
	<label>EMAIL</label><br>
	<input type="email" name="email" value="<?php echo $info['email'];?>"> <br><br>
	<input type="submit" value="Salvar">
</form>