<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="pt-br" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>CURRICULUM VITAE</title>
<link href="css/curriculo.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.auto-style1 {
	font-family: "Times New Roman", Times, serif;
	font-size: large;
	text-align: center;
}
.auto-style2 {
	text-align: center;
}
</style>
</head>

<body>

<p>&nbsp;</p>
<p class="auto-style1"><strong>CURRICULUM VITAE</strong></p>
<p class="auto-style2"><strong><?php echo $_POST['nome']; ?></strong></p>
<table style="font: normal normal bold 100% serif; width: 80%">
	<tr>
		<td style="width: 461px">Rua <?php echo $_POST['EndRua']; ?> , <?php echo $_POST['EndNum']; ?> - <?php echo $_POST['EndBairro']; ?>&nbsp;</td>
		<td><?php echo $_POST["nacionalidade"]; ?></td>
	</tr>
	<tr>
		<td style="width: 461px"><?php echo $_POST['EndCidade']; ?> - <?php echo $_POST["EndEstado"]; ?>, CEP: <?php echo $_POST["EndCEP"]; ?></td>
		<td><?php echo $_POST["estadoCivil"]; ?></td>
	</tr>
	<tr>
		<td style="width: 461px">Contato: <?php echo $_POST["telefone"]; ?></td>
		<td><?php echo $_POST["idade"]; ?> Anos</td>
	</tr>
	<tr>
		<td colspan="2">E-mail: <?php echo $_POST['email']; ?></td>
	</tr>
	<tr>
		<td colspan="2">LinkedIn: https://br.linkedin.com/in/<?php echo $_POST["linkedin-url"]; ?></td>
	</tr>
</table>

<p>&nbsp;</p>
<?php echo $_POST["resumo"]; ?>
<p>&nbsp;</p>
<p><strong>FORMAÇÃO ESCOLAR</strong></p>
<p>Ensino <?php echo $_POST["nivel"];?> <?php echo $_POST["status"];?> <?php echo " - ".$_POST["instituicao"]; ?><?php echo " - ".$_POST["cursoFormacao"]; ?>  </p>
<p>&nbsp;</p>
<p><strong>EXPERIÊNCIA PROFISSINOAL</strong></p>
<ul>
	<li><strong><?php echo $_POST["empresa"];?></strong> <em><?php echo " - (".$_POST["telReferencia"]>") ".$_POST["nomeReferencia"]; ?> </em> </li></ul>
<table style="width: 80%">
	<tr>
		<td style="width: 461px"><?php echo "     Função: ".$_POST["funcao"];?></td>
		<td><?php echo $_POST["periodoIni"]." à ".$_POST["periodoFim"];?></td>
	</tr>
</table>
<ul>
	<li><strong><?php echo $_POST["empresa2"];?></strong> <em><?php echo " - (".$_POST["telReferencia2"]>") ".$_POST["nomeReferencia2"]; ?> </em> </li>
</ul>
<p>
	<table style="width: 80%">
		<tr>
			<td style="width: 461px"><?php echo "     Função: ".$_POST["funcao2"];?></td>
			<td><?php echo $_POST["periodoIni2"]." à ".$_POST["periodoFim2"];?></td>
		</tr>
	</table>
</p>
<ul>
	<li><strong><?php echo $_POST["empresa3"];?></strong><em><?php echo $_POST["telReferencia3"]; ?> <?php echo $_POST["nomeReferencia3"]; ?> 
	</em></li>
</ul>
<p>
	<table style="width: 80%">
		<tr>
			<td style="width: 461px"><?php echo "     Função: ".$_POST["funcao3"];?></td>
			<td><?php echo $_POST["periodoIni3"]." à ".$_POST["periodoFim3"];?></td>
		</tr>
	</table>
</p>
<p><strong>CURSOS E ESPECIALIZAÇÕES </strong></p>

<ul>
	<li><strong><?php echo $_POST["curso"];?></strong> - <?php echo $_POST["instituicaoCurso"]; ?> - <?php echo $_POST["statusCurso"]; ?> <?php echo "(".$_POST["instituicaoCurso"].")"; ?></li>
	<li><strong><?php echo $_POST["curso2"];?></strong> - <?php echo $_POST["instituicaoCurso2"]; ?></li>
	<li><strong><?php echo $_POST["curso3"];?></strong><?php echo " - ".$_POST["instituicaoCurso3"]; ?></li>
</ul>

</body>

</html>
