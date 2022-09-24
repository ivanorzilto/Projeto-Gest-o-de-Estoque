<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
	<div class="row m-5">
		<div class="col-l-6 offset-l-3">
			<div class="card text-center p-1">
				<h3 class="p-2">SETUP</h3>
				<div class="p-1">
					<a href="<?php echo site_url('geral/resetdb')?>" class="btn btn-primary">RESETAR BASE DE DADOS</a>
				</div>
				<div class="p-1">
					<a href="<?php echo site_url('geral/inserirusuario')?>" class="btn btn-primary">INSERIR USUÁRIO</a>
				</div>
				<div class="p-1">
					<a href="<?php echo site_url('geral/inserirproduto')?>" class="btn btn-primary">INSERIR PRODUTO</a>
				</div>
				<div class="p-1">
					<a href="<?php echo site_url('geral')?>" class="btn btn-primary">VOLTAR</a>
				</div>
			</div>
		</div>
	</div>
</div>
