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

        // Criando um objeto de resposta para retornar apenas os campos necessários
        $mensagens_whatsapp = $Objeto_json['mensagens_whatsapp'];
        $mensagens_instagram = $Objeto_json['mensagens_instagram'];
        $dias_que_conversamos = $Objeto_json['dias_que_conversamos'];


        $dados = [                         
                    "mensagens_whatsapp" => $mensagens_whatsapp,
                    "mensagens_instagram" => $mensagens_instagram,
                    "dias_que_conversamos" => $dias_que_conversamos
                ];



        // Retorna o objeto como JSON
        header('Content-Type: application/json');
        echo json_encode($dados);

    } else {

        // Caso ocorra erro na decodificação do JSON
        echo json_encode(["error" => "Erro ao decodificar o JSON."]);

    }
} else {

    // Caso o arquivo não exista
    echo json_encode(["error" => "Arquivo não encontrado."]);

}
?>
