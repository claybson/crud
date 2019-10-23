<?php 
	include 'contatos.php';
	$contato = new Contato();
	$lista = $contato->getAll();
?>

<form action="adiciona.php" method="POST">
	<label>NOME</label><br>
	<input type="text" name="nome"> <br><br>
	<label>EMAIL</label><br>
	<input type="email" name="email"> <br><br>
	<input type="submit" value="Adicionar">
</form>

<table border="1px" width="500px">
	<tr>
		<th>ID</th>
		<th>EMAIL</th>
		<th>NOME</th>
		<th>AÇÕES</th>
	</tr>
	<?php foreach ($lista as $item) :?>
	<tr>
		<td><?php echo $item['id'];?></td>
		<td><?php echo $item['email'];?></td>
		<td><?php echo $item['nome'];?></td>
		<td>
			<a href="editar.php?id=<?php echo $item['id'];?>">[EDITAR]</a>
			<a href="excluir.php?id=<?php echo $item['id'];?>">[EXCLUIR]</a>
		</td>
	</tr>
	<?php endforeach;?>
</table>