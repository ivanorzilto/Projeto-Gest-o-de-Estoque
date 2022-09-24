<?php
	defined('BASEPATH') OR exit ('URL inválida.');
?>

<div class="container pt-3 pb-3">
	<div class="row">
		<div class="col-6">
			<a href="<?php echo site_url('gestao/home')?>" class="btn btn-primary">Voltar</a>
		</div>
		<div class="col-6">
			<a href="<?php echo site_url('gestao/excluirmovimentos')?>" class="btn btn-primary">Excluir Registros</a>
		</div>
	</div>
	<hr>
	<?php if(count($movimentos)==0): ?>
		<div class="text-center pb-2 pt-2">
			Não existem movimentos!
		</div>
		<?php else:?>
			<table class="table table-striped">
				<thead class="thead-dark">
					<th>Data</th>
					<th>Produto</th>
					<th>Movimento</th>
				</thead>
				<?php foreach($movimentos as $movimento): ?>
					<tr>
						<td><?php echo $movimento['data_hora'] ?></td>
						<td><?php echo $movimento['descricao'] ?></td>
						<td><?php echo $movimento['quantidade'] ?></td>
					</tr>
					<?php endforeach; ?> 	
			</table>
			<hr>
			<p>Movimentos: <b><?php echo count($movimentos) ?></b></p>
	<?php endif; ?>
</div>
