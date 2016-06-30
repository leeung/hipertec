<?php
$vagas = $dados ['vagas'];

// echo "<pre>";
// var_dump($vagas);
?>

<div class="container">

	

	<?php foreach ($dados['vagas'] as $vaga):?>
	<br/>
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-sm-offset-2 bg-primary ">
			<table>
				<tr>
					<td>
						<div class="row">
							<img class="image col-xs-3" src="gui/img/logo_teste.png">
							<h3 class="col-xs-8"><?=$vaga->getTitulo();?></h3>
							<p class="col-xs-8">
								<small>Empresa:</small> <?=$vaga->getEmpresa();?></p>
							<p class="col-xs-8">
								<small>Data Postagem:</small> <?=$vaga->getPostagem();?></p>
							<p class="col-xs-8">
								<small>Expira em:</small> <?=$vaga->getVencimento();?></p>

						</div>
					</td>
					<td>
						<button class="btn btn-primary txt-center ">Inscrever-me</button>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<?php endforeach;?>
	
</div>