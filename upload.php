<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file-upload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verificar se o arquivo é uma imagem real
    $check = getimagesize($_FILES["file-upload"]["tmp_name"]);
    if ($check !== false) {
        echo "O arquivo é uma imagem - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "O arquivo não é uma imagem.";
        $uploadOk = 0;
    }

    // Verificar se o arquivo já existe
    if (file_exists($target_file)) {
        echo "Desculpe, o arquivo já existe.";
        $uploadOk = 0;
    }

    // Verificar o tamanho do arquivo
    if ($_FILES["file-upload"]["size"] > 5000000) { // 5MB limite
        echo "Desculpe, seu arquivo é muito grande.";
        $uploadOk = 0;
    }

    // Permitir determinados formatos de arquivo
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Desculpe, apenas arquivos JPG, JPEG, PNG & GIF são permitidos.";
        $uploadOk = 0;
    }

    // Verificar se $uploadOk está definido como 0 por um erro
    if ($uploadOk == 0) {
        echo "Desculpe, seu arquivo não foi carregado.";
    } else {
        // Tentar fazer upload do arquivo
        if (move_uploaded_file($_FILES["file-upload"]["tmp_name"], $target_file)) {
            echo "O arquivo " . htmlspecialchars(basename($_FILES["file-upload"]["name"])) . " foi enviado.";
        } else {
            echo "Desculpe, houve um erro ao fazer upload do seu arquivo.";
        }
    }
}
?>
