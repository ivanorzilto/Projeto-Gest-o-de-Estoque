<?php
	defined('BASEPATH') OR exit ('URL inválida.');
?>

<div class="container mt-3 mb-3">
	<div class="row">
		<div class="col-sm-8 col-12 text-left">
			<a href="<?php echo site_url('gestao/novo')?>" class="btn btn-primary">NOVO PRODUTO</a>
			<a href="<?php echo site_url('gestao/movimentos')?>" class="btn btn-primary">MOVIMENTOS</a>
		</div>
		<div class="col-sm-4 col-12 text-right">
			<a href="<?php echo site_url('geral/logout')?>" class="btn btn-primary">LOGOUT</a>
		</div>
	</div>
	<hr>
	<div class="mt-3 mb-3">
		<?php if(count($produtos)==0):?>
			<p class="text-center">Não existem produtos cadastrados</p>
		<?php else :?>
			<table class="table table-striped">
				<thead class="thead-dark">
					<th class="text-left">Produto</th>
					<th class="text-center">Quantidade</th>
					<th></th>
				</thead>
				<?php foreach($produtos as $produto):?>
				<tr>
					<td class="text-left">
						<a href="<?php echo site_url('gestao/editar/'.$produto['id_produto'])?>" class="mr-3"><i class="fa fa-pencil"></i></a>
						<?php echo $produto['descricao']?>
					</td>
					<td class="text-center">
						<?php echo $produto['quantidade']?>
					</td>
					<td class="text-right">
						<a href="<?php echo site_url('gestao/adicionar/'.$produto['id_produto'])?>" class="mr-3"><i class="fa fa-plus-square"></i></a>
						<a href="<?php echo site_url('gestao/subtrair/'.$produto['id_produto'])?>" class="mr-3"><i class="fa fa-minus-square"></i></a>
						<a href="<?php echo site_url('gestao/excluir/'.$produto['id_produto'])?>" class="mr-3"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
				<?php endforeach;?>
			</table>
			<hr>
			<p>Total Produtos: <b><?php echo count($produtos);?></b></p>
		<?php endif; ?>
	</div>
</div>
