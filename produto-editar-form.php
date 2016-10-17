<?php 
	include("cabecalho.php"); 
	include("conecta.php");
	include("banco-categoria.php");
	include("banco-produto.php");


	$id = $_GET['id'];
	$produto = buscaProduto($conexao, $id);
	$categorias = listaCategorias($conexao);
	$usado = $produto['usado'] ? "checked='checked'" : "";
	?>

<h2>Editar o produto</h2>

	<form action="editar-produto.php" method="Post">
		<input type="hidden" name="id" value="<?=$produto['id']?>">
		<table class="table">
			<tr>
				<td>Nome</td>
				<td><input type="text" name="nome" value="<?=$produto['nome']?>" class="form-control"/></td>
			</tr>

			<tr>
				<td>Preço</td>
				<td><input type="text" name="preco" value="<?=$produto['preco']?>" class="form-control"></td>
			</tr>

			<tr>
				<td>Descrição</td>
				<td><textarea name="descricao" cols="30" rows="10" class="form-control"><?=$produto['descricao']?></textarea></td>
			</tr>

			<tr>
				<td>Estado</td>
				<td>
					<input type="checkbox" name="usado" <?=$usado?> value="true">Usado<br />
					<input type="checkbox" name="usado" <?=$usado?> value="false">Novo
				</td>
			</tr>

			<tr>
				<td>Categoria</td>
				<td>
					<select name="categoriaID" class="form-control">
						<?php foreach($categorias as $categoria) : 
						$ehCategoria = $produto['categoriaID'] == $categoria['id'];
						$selecao = $ehCategoria ? "selected='selected'" : ""; ?>
	    				
	    				<option value="<?=$categoria['id']?>"
	    					<?=$selecao?>>
	    					<?=$categoria['nome']?>
	    				</option>
	    				<?php endforeach ?>
					</select>
				</td>
			</tr>
			
			<tr>
				<td><input type="submit" value="Alterar" class="btn btn-primary"></td>
			</tr>
		</table>
	</form>

<?php include("rodape.php"); ?>