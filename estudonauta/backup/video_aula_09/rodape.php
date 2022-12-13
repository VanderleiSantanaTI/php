<?php
	echo "<footer>";
	echo "<p> Acessado por ". $_SERVER['REMOTE_ADDR'] ." em ". date('d/m/y') ."</p>";# se (d/m/y) for (D/M/Y) muda a formatação
	echo "<p>Desenvolvido por VSATECH &copy; 2022</p>";
	echo "</footer>";
	$banco->close();