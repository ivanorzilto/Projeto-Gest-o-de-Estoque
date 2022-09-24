<?php
	defined('BASEPATH') OR exit ('URL inválida.');
?>

<div class=" container mt-5 mb-5">
	<div class="row">
		<div class="col-sm-8 offset-sm-2 col-12">
			<div class="card p-4">
				<h3><?php echo $produto['descricao'];?></h3>
				<hr>
				<form action="<?php echo site_url('gestao/editarsalvar/'.$produto['id_produto']);?>" method="POST">
					<div class="form-group">
						<label for="">Descrição</label>
						<input type="text" name="text-descricao" class="form-control" placeholder="Nome do Produto" value="<?php echo $produto['descricao']; ?>" required>
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
					<button class="btn btn-primary" type="submit">Atualizar</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
