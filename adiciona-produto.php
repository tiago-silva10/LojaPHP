<?php 
	include("cabecalho.php");
	include("conecta.php");
	include("banco-produto.php");

	$nome = $_POST['nome'];
	$preco = $_POST['preco'];
	$descricao = $_POST['descricao'];
	$categoriaID = $_POST['categoriaID'];
	if(array_key_exists('usado', $_POST)) {
		$usado = "true";
	} else {
		$usado = "false";
	}
		

	if(alteraProduto($conexao, $nome, $preco, $descricao, $categoriaID, $usado)) { ?>

		<p class="text-success">O Produto <?= $nome ?>, <?= $preco ?> foi alterado.</p>

	<?php } else {
		$msg = mysqli_error($conexao);
	?>
		<p class="text-danger">O produto <?= $nome ?> não foi alterado: <?= $msg ?></p>
	<?php
	}
	?>

	<?php include("rodape.php"); ?>