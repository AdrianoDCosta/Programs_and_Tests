<?php

	$dia = date("d");
	$dianome = date("w");
	$mes = date("n");
	$ano = date("Y");
	
	$diasemana[0]="Domingo";
	$diasemana[1]="Segunda-feira";
	$diasemana[2]="Terça-feira";
	$diasemana[3]="Quarta-feira";
	$diasemana[4]="Quinta-feira";
	$diasemana[5]="Sexta-feira";
	$diasemana[6]="Sábado";
	
	$mesAtual[1]="Janeiro";
	$mesAtual[2]="Fevereiro";
	$mesAtual[3]="Março";
	$mesAtual[4]="Abril";
	$mesAtual[5]="Maio";
	$mesAtual[6]="Junho";
	$mesAtual[7]="Julho";
	$mesAtual[8]="Agosto";
	$mesAtual[9]="Setembro";
	$mesAtual[10]="Outubro";
	$mesAtual[11]="Novembro";
	$mesAtual[12]="Dezembro";

	echo $diasemana[$dianome] . ", " . $dia . " de " . $mesAtual[$mes] . " de " . $ano;
?>