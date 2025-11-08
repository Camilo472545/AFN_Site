<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar dados do formulário
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $servico = htmlspecialchars($_POST['servico']);
    $mensagem = htmlspecialchars($_POST['mensagem']);
    
    // Destinatário do e-mail (ALTERE PARA SEU E-MAIL)
    $destinatario = "professorti60@gmail.com";
    
    // Assunto do e-mail
    $assunto = "Novo Contato do Site AFN Instalações - " . $servico;
    
    // Montar o corpo do e-mail
    $corpo = "
    <html>
    <head>
        <title>Novo Contato do Site</title>
        <style>
            body { font-family: Arial, sans-serif; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: #0056b3; color: white; padding: 20px; text-align: center; }
            .content { padding: 20px; background: #f9f9f9; }
            .field { margin-bottom: 10px; }
            .label { font-weight: bold; color: #333; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>Novo Contato do Site AFN Instalações</h2>
            </div>
            <div class='content'>
                <div class='field'>
                    <span class='label'>Nome:</span> $nome
                </div>
                <div class='field'>
                    <span class='label'>E-mail:</span> $email
                </div>
                <div class='field'>
                    <span class='label'>Telefone:</span> $telefone
                </div>
                <div class='field'>
                    <span class='label'>Serviço de Interesse:</span> $servico
                </div>
                <div class='field'>
                    <span class='label'>Mensagem:</span><br>
                    $mensagem
                </div>
                <div class='field'>
                    <span class='label'>Data do Envio:</span> " . date('d/m/Y H:i:s') . "
                </div>
            </div>
        </div>
    </body>
    </html>
    ";
    
    // Cabeçalhos do e-mail
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $nome <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    
    // Tentar enviar o e-mail
    if (mail($destinatario, $assunto, $corpo, $headers)) {
        echo "sucesso";
    } else {
        echo "erro";
    }
} else {
    echo "erro";
}
?>