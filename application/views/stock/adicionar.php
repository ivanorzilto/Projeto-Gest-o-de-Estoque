<?php
	defined('BASEPATH') OR exit ('URL inválida.');
?>

<div class="pb-5 pt-5">
	<div class="row">
		<div class="col-sm-8 col-sm-12">
			<div class="card p-4">

			<h4><?php echo $produto['descricao']?></h4>
			<p>Quantidade Atual: <?php echo $produto['quantidade']?></p>
			<hr>

			<form action="<?php echo site_url('gestao/adicionar/'.$produto['id_produto']) ?>" method="post">
				<div class="form-group">
					<div class="col-sm-2 offset-sm-5 col-4 offset-4">
						<input type="number" name="count_quantidade" class="form-control" value=1 min=1 max=1000>
					</div>
				</div>
				<div class="text-center">
					<a href="<?php echo site_url('gestao/home')?>" class="btn btn-primary">Cancelar</a>
					<button type="submit" class="btn btn-primary">Adicionar</button>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>
