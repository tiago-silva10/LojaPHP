<?php 
	include("cabecalho.php");
	include("conecta.php");
	include("banco-produto.php");
	include("banco-categoria.php"):

	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$preco = $_POST['preco'];
	$descricao = $_POST['descricao'];
	$categoriaID = $_POST['categoriaID'];
	
	if(array_key_exists('usado', $_POST)) {
		$usado = "true";
	} else {
		$usado = "false";
	}
		

	if(alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoriaID, $usado)) { ?>

		<p class="text-success">O Produto <?=$nome?>, <?=$preco?> adicionado.</p>

	<?php } else {
		$msg = mysqli_error($conexao);
	?>
		<p class="text-danger">O produto <?=$nome?> não foi adicionado: <?=$msg?></p>
	<?php
	}
	?>

	<?php include("rodape.php"); ?>