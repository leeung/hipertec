<?php 
	$curriculo = $dados['curriculo'];
	//echo "<pre>";
	//print_r($curriculo);
?>

   <form action="curriculo.php" method="post">

        <div class="container">
            <h1>CURRICULUM VITAE</h1>
            
            <div class="row">
                <h2>Dados Pessoais</h2>

                <div class="col-md-12">
                    <input class="form-control" type="text" name="nome" value="<?=$curriculo->getAluno()->getNome() ?>" placeholder="Nome Completo" required>
                </div>

                <div class="col-md-8">
                    <input class="form-control" type="text" name="EndRua" value="<?= $curriculo->getAluno()->getEndereco()->getLogradouro() ?>" placeholder="Rua/Av">
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" name="EndNum" value="<?=$curriculo->getAluno()->getEndereco()->getNumero() ?>" placeholder="Número">
                </div>

                <div class="col-md-2">
                    <input class="form-control" type="text" name="EndBairro" value="<?=$curriculo->getAluno()->getEndereco()->getBairro() ?>" placeholder="Bairro">
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" name="EndCidade" value="<?=$curriculo->getAluno()->getEndereco()->getCidade() ?>" placeholder="Cidade">
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" name="EndEstado" value="<?=$curriculo->getAluno()->getEndereco()->getEstado() ?>" placeholder="Estado">
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" name="EndCEP" value="<?=$curriculo->getAluno()->getEndereco()->getCep() ?>" placeholder="CEP">
                </div>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="nacionalidade" value="<?=$curriculo->getAluno()->getNacionalidade() ?>"placeholder="Nacionalidade">
                </div>  
                <div class="col-md-2">
                    <input class="form-control" type="text" name="estadoCivil" value="<?=$curriculo->getAluno()->getEstadoCivil() ?>" placeholder="Estado Civil">
                </div>
				<div class="col-md-4">
                    <input class="form-control" type="tel" name="telefone" value="<?=$curriculo->getAluno()->getTelefone() ?>" placeholder="(ddd)telefone">
                </div>
				<div class="col-md-2">
                    <input class="form-control" type="number" min="0" name="idade" value="<?=$curriculo->getAluno()->getIdade() ?>" placeholder="idade">
                </div>
				<div class="col-md-4">
                    <input class="form-control" type="text" name="email" value="<?=$curriculo->getAluno()->getEmail() ?>" placeholder="E-mail">
                </div>

                <div class="col-md-4">
                    <div class="input-group">
                      <span class="input-group-addon" name="basic-addon3">https://br.linkedin.com/in/</span>
                      <input type="text" class="form-control" name="linkedin" aria-describedby="basic-addon3" value="<?=$curriculo->getResumo()?>" placeholder="LinkedIn">
                    </div>
                </div>
            </div>
            
            <div class="row">
				<h2>Resumo</h2>
				<div class="col-md-12">
					<textarea class="form-control"  rows="3" name="resumo" placeholder="Resumo, pretenções ou mini-Curriculo"></textarea>
				</div>
			</div>
            
            <div class="row">
                <h2>Formação Escolar</h2>
                <div class="col-md-2">
                    <select class="form-control" name="nivel">
                      <option selected="selected" ></option>
                      <option>Ensino Fundamental</option>
                      <option>Ensino Médio</option>
                      <option>Graduação</option>
                      <option>Pós Graduação</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-control" name="status">
                      <option selected="selected" ></option>
                      <option>Concluído</option>
                      <option>Andameto</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="month" name="anoFormacao" placeholder="Ano Formação/Previsão">
                </div>
                
				<div class="col-md-6">
                    <input class="form-control" type="text" name="cursoFormacao" placeholder="Curso / Série">
                </div>
                <div class="col-md-12">
                    <input class="form-control" type="text" name="instituicao" placeholder="Instituição">
                </div>
                
            </div>
            
			<div class="row">
				<h2>Cursos e Especializações</h2>
			</div>
			
			<div class="row">
			<?php foreach ($curriculo->getCompetencias() as $row):?>
				<div class="col-md-4">
					<input class="form-control" type="text" name="Curso" value="<?= $row->getCurso()?>" placeholder="Curso">
				</div>
				<div class="col-md-4">
					<input class="form-control" type="text" name="instituicaoCurso" value="<?= $row->getInstituicao()?>" placeholder="Instituição">
				</div>
				<div class="col-md-2">
					<select class="form-control" name="statusCurso">
					 	<option <?php if($row->getStatus() == "Concluido") echo "selected"?> >Concluído</option>
					  	<option <?php if($row->getStatus() == "Andamento") echo "selected"?> >Andameto</option>
					</select>
				</div>
				<div class="col-md-2">
					<input class="form-control" type="text" min="1900" name="anoCurso" value="<?= $row->getConclusao()?>" placeholder="Ano" >                    
				</div>
			<?php endforeach;?>
            </div>
			
			<div class="row">
                <h2>Experiência Profissional</h2>
            </div>
            <?php foreach ($curriculo->getExperiencias() as $exp):?>
                <div class="espacamento row">
                    <div class="col-md-12 ">
                        <input class="form-control" type="text" name="empresa" value="<?=$exp->getEmpresa() ?>" placeholder="Empresa">
                    </div>
                    <div class="col-md-4 col-md-offset-0">
                        <input class="form-control" type="text" name="funcao" value="<?=$exp->getFuncao() ?>" placeholder="Última Função">
                    </div>
                    <div class="col-md-2 col-md-offset-0">
                        <input class="form-control" type="text" name="periodoIni"  value="<?=$exp->getInicio() ?>">
                    </div>
                    <div class="col-md-2 col-md-offset-0">
                        <input class="form-control" type="text" name="periodoFim" value="<?=$exp->getFim() ?>">
                    </div>
					<div class="col-md-2 col-md-offset-0">
                        <input class="form-control" type="text" name="nomeReferencia" value="" placeholder="Referência">
                    </div>
					<div class="col-md-2 col-md-offset-0">
                        <input class="form-control" type="tel" name="telReferencia"  value="" placeholder="Telefone Para Contato">
                    </div>
                </div> 
                <br/>
            <?php endforeach;?>	
    	       
        
            <div class="row">
                <h2>Informações Adicionais</h2>
            </div>
                <div class="espacamento row">
                    <div class="col-md-12 ">
                    <?php foreach ($curriculo->getInfoAdicionais() as $row):?>
                        <input class="form-control" type="text" name="infAdicional" value="<?=$row->getDescricao()?>" placeholder="Informações Adcicionais">
                    <?php endforeach;?>
                    </div>
                </div> 

			<br/>
            <div class="btGerarCurriculo">
                <a href="index.php?entidade=curriculo&funcao=alterar"><button type="submit" class="btn btn-primary btn-lg dance">Salvar</button></a>
            </div>
        </div>
    </form> 