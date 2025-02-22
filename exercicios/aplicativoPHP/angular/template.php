<?php
function renderPage($file) {
    // Lê o conteúdo do arquivo HTML
    $content = file_get_contents($file);

    // Ajuste os caminhos para incluir a pasta 'includes'
    $header = file_get_contents('includes/header.php'); 
    $footer = file_get_contents('includes/footer.php'); 

    // Substitui as marcas [#header#] e [#footer#] pelo conteúdo real
    $content = str_replace('[#header#]', $header, $content);
    $content = str_replace('[#footer#]', $footer, $content);

    // Exibe o conteúdo final
    echo $content;
}
?>
