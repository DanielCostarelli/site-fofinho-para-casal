<?php
// Caminho do arquivo onde o conteúdo está armazenado
$arquivo = "estatisticas.json";

// Verifica se o arquivo existe
if (file_exists($arquivo)) {

    // Lê o conteúdo do arquivo
    $conteudo = file_get_contents($arquivo);

    // Decodifica o JSON
    $Objeto_json = json_decode($conteudo, true);

    // Verifica se a decodificação foi bem-sucedida
    if (json_last_error() === JSON_ERROR_NONE) {

        // Retorna o objeto como JSON
        header('Content-Type: application/json');
        echo json_encode($Objeto_json);

    } else {

        // Caso ocorra erro na decodificação do JSON
        echo json_encode(["error" => "Erro ao decodificar o JSON."]);

    }
} else {

    // Caso o arquivo não exista
    echo json_encode(["error" => "Arquivo não encontrado."]);
    
}
?>
