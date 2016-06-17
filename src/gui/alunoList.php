<div class="container">
	<table class="table">
	<thead>
		<tr>
			<td>ID</td>
			<td>NOME</td>
			<td>IDADE</td>
			<td>TELEFONE</td>
			<td>NACIONALIDADE</td>
			<td>ENDEREÇO</td>
			<td>SEXO</td>
			<td>FOTO</td>
			<td>E-MAIL</td>
			<td>LINKEDIN</td>
			<td>FACEBOOK</td>
		</tr>
	</thead>
	
	<tbody>
		<?php foreach ($dados['alunos'] as $aluno):?>
		<tr>
			<td><?= $aluno->getId();?></td>
			<td><?= $aluno->getNome();?></td>
			<td><?= $aluno->getIdade();?></td>
			<td><?= $aluno->getTelefone();?></td>
			<td><?= $aluno->getNacionalidade();?></td>
			<td><?= $aluno->getEndereco()->getId();?></td>
			<td><?= $aluno->getSexo();?></td>
			<td><?= $aluno->getFoto();?></td>
			<td><?= $aluno->getEmail();?></td>
			<td><?= $aluno->getLinkedin();?></td>
			<td><?= $aluno->getFacebook();?></td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>

<a href="index.php?pagina=alunoNovo"><button type="submit" class="btn btn-primary btn-lg dance">Novo Aluno</button></a>

</div>