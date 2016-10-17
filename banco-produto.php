<?php

function listaProdutos($conexao) {
	$produtos = array();
	$resultado = mysqli_query($conexao, "select p.nome, p.preco, p.descricao, c.nome as categoria_nome from produto as p join categoria as c on (c.id = p.categoriaID)");
	while ($produto = mysqli_fetch_assoc($resultado)) {
		array_push($produtos, $produto);
	}
	return $produtos;
}

function insereProduto($conexao, $nome, $preco, $descricao, $categoriaID, $usado) {
    $query = "insert into produto (nome, preco, descricao, categoriaID, usado) values ('{$nome}', {$preco}, '{$descricao}', {$categoriaID}, {$usado})";
    $resultadoDaInsercao = mysqli_query($conexao, $query);
    return $resultadoDaInsercao;
}

function buscaProduto($conexao, $id) {
	$query = "select * from produto where id = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoriaID, $usado) {
	$query = "update produto set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoriaID = {$categoriaID}, usado = {$usado} where id = '{$id}'";
	return mysqli_query($conexao, $query);
}

function removeProduto($conexao, $id) {
	$query = "delete from produto where id = {$id}";
	return mysqli_query($conexao, $query);
}

?>