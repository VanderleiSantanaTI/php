<?php
	function thumb($foto) {
		$arquivo = "fotos/$foto";	
		if (is_null($foto) || !file_exists($arquivo)){
			return "fotos/indisponivel.png";
		} else {
			return $arquivo;
		} 
	}