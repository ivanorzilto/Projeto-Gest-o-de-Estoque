<?php
	defined('BASEPATH') OR exit ('URL inválida.');
?>

<div class="pt-5 pb-5">
	<div class="row">
		<div class="col-sm-6 offset-sm-3 col-12">
			<div class="card p-4 text-center">
				<h4><?php echo $produto['descricao']?></h4>
				<p>Deseja mesmo excluir?</p>
				<div class="pt-3 pb-3">
					<a href="<?php echo site_url('gestao/home')?>" class="btn btn-primary">Cancelar</a>
					<a href="<?php echo site_url('gestao/excluir/'.$produto['id_produto'].'/true')?>" class="btn btn-primary">Eliminar</a>
				</div>
			</div>
		</div>
	</div>
</div>
