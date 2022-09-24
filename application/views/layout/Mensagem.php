<?php
defined('BASEPATH') OR exit('URL inválida.');
?>

<div class="container-fluid text-center">
	<div class="row">
		<div class="col-l-6 offset-l-3">
			<div class="text-center alert alert-<?php echo $tipo;?>">
				<p><?php echo $mensagem;?></p>
			</div>
		</div>
	</div>
</div>
