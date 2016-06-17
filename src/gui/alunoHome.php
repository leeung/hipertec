
<dir class="container painel">
	<div class="row">
		<h1 class="text-center">Painel principal</h1>
	</div>
	<br />
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-sm-offset-2">
			<div class="menu-controle">
				<div class="col-xs-5">
					<form method="post" action="index.php?entidade=curriculo&funcao=getCurriculoByCpf">
						<div class="row"></div>
						<div class="row text-center">
						<button type="submit" class="text-center btn"><img src="gui/img/ico_aluno.jpg"></button>
						<input class="form-control" type="text" name="cpf"required placeholder="cpf">
						</div>
					</form>
				</div>
				
				<div class="col-xs-5 col-xs-offset-2">
					<form method="post" action="index.php?entidade=aluno&funcao=existe">
						<div class="row"></div>
						<div class="row text-center">
						<button type="submit" class="text-center btn"><img src="gui/img/ico_vagas.png"></button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</dir>