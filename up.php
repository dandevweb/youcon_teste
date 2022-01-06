<?php

include('config.php');

if (isset($_FILES['file']) && !empty($_FILES['file']['name'])) {
    if (Utils::validarArquivo($_FILES['file'])) {
            //Arquivo válido
        if ($arquivoNome = Utils::uploadFile($_FILES['file'])) {
            die(json_encode($arquivoNome));
        }
    }
}
