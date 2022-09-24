<?php
	defined('BASEPATH') OR exit ('URL inválida.');
?>

<div class=" container mt-5 mb-5">
	<div class="row">
		<div class="col-sm-6 offset-sm-3 col-12">
			<div class="card p-4">
				<h3>NOVO PRODUTO</h3>
				<hr>
				<form action="<?php echo site_url('gestao/novosalvar/');?>" method="POST">
					<div class="form-group">
						<label for="">Descrição</label>
						<input type="text" name="text-descricao" class="form-control" placeholder="Nome do Produto" required>
					</div>
					<div class="form-group">
						<label for="">Quantidade</label>
						<input type="number" name="text-quantidade" class="form-control" placeholder="Quantidade do Produto" required>
					</div>
				<?php if(isset($mensagem) and $mensagem =='Já existe um produto cadastrado com o mesmo nome'):?>
				<div class="alert alert-danger text-center">
					<?php echo $mensagem;?>
				</div>
				<?php endif;?>
				<?php if(isset($mensagem) and $mensagem =='Dados atualizados com sucesso!'): ?>
					<div class="alert alert-success text-center">
					<?php echo $mensagem;?>
				</div>	
				<?php endif;?>
				<div class="text-center">
					<a href="<?php echo site_url('gestao/home');?>" class="btn btn-primary">Cancelar</a>
					<button class="btn btn-primary" type="submit">Gravar</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
