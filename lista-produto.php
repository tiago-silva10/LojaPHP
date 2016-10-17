<?php 
	include("cabecalho.php");
	include("conecta.php");
	include("banco-produto.php");
	include("banco-categoria.php");

	if(array_key_exists("removido", $_GET) && $_GET["removido"]==true) {
	?>
		<p class="alert-sucess">Produto apagado com sucesso.</p>

	<?php
		}
	?>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Preço</th>
				<th>Descrição</th>
				<th>Categoria</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$produtos = listaProdutos($conexao);
				foreach($produtos as $produto) :
			?>	
			<tr>
				<td><?=$produto["nome"]?></td>
				<td><?=$produto["preco"]?></td>
				<td><?=$produto["descricao"]?></td>
				<td><?=$produto["categoria_nome"]?></td>
				<td><a class="btn btn-primary" href="produto-editar-form.php?id=<?=$produto['id']?>">Editar</a></td>
				<td>
					<form action="delete-produto.php" method="Post">
						<input type="hidden" name="id" value="<?=$produto['id']?>" />
						<button class="btn btn-danger">Remover</button>
					</form>
				</td>
			</tr>

			<?php
				endforeach
			?>
		</tbody>
	</table>

<?php include("rodape.php"); ?>