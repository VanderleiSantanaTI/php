<?php
  function thumb($arq) {	  
	  $caminho = "fotos/$arq";
	  if(is_null($arq) || !file_exists($caminho)){
		  #caso no banco estiver vazio (NULL) ou não existir o caminho retornará uma foto de escolha
		return "fotos/indisponivel.png";  
	  }else{
		  return  $caminho;
		  
	  }
  }
 ?>