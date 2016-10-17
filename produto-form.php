<?php 
	include("cabecalho.php"); 
	include("conecta.php");
	include("banco-categoria.php"); 

	$categorias = listaCategorias($conexao); ?>

<h2>Formulario de cadastro</h2>

	<form action="adiciona-produto.php" method="Post">
		<table class="table">
			<tr>
				<td>Nome</td>
				<td><input type="text" name="nome" class="form-control"/></td>
			</tr>

			<tr>
				<td>Preço</td>
				<td><input type="text" name="preco" class="form-control"></td>
			</tr>

			<tr>
				<td>Descrição</td>
				<td><textarea name="descricao" cols="30" rows="10" class="form-control"></textarea></td>
			</tr>

			<tr>
				<td>Estado</td>
				<td>
					<input type="checkbox" name="usado" value="true">Usado<br />
					<input type="checkbox" name="usado" value="false">Novo
				</td>
			</tr>

			<tr>
				<td>Categoria</td>
				<td>
					<select name="categoriaID" class="form-control">
						<?php foreach($categorias as $categoria) : ?>
	    				<option value="<?=$categoria['id']?>"><?=$categoria['nome']?><br />
	    				<?php endforeach ?>
					</select>
				</td>
			</tr>

			<tr>
				<td><input type="submit" value="Cadastrar" class="btn btn-primary"></td>
			</tr>
		</table>
	</form>

<?php include("rodape.php"); ?>
