<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Casa Inteligente</title>
    <style>
        /* Estilos CSS */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Casa Inteligente</h1>
    <?php
    // Função para verificar se o sensor de temperatura foi acionado (simulação)
    function verificarSensorVazameentoGases() {
        // Implemente a lógica real para verificar o sensor de porta aberta aqui
        // Neste exemplo, vamos simular que o sensor é acionado aleatoriamente
        //vazamento_gases=fechar_registro, enviar_alerta, abrir_janelas_portas, ativar_alerta_bombeiros, desligar_energia
        return rand(0, 1); // Retorna 0 (não acionado) ou 1 (acionado)
    }

    // Função para verificar se o sensor de fumaça foi acionado (simulação)
    function verificarSensorFumaca() {
        // Implemente a lógica real para verificar o sensor de fumaça aqui
        // Neste exemplo, vamos simular que o sensor é acionado aleatoriamente
        //fumaça=ligar_luzes, desligar_energia, ativar_alerta_bombeiros, ativar_alerta_proprietario, ativar_sprinkles, ativar_alarme_incendio
        return rand(0, 1); // Retorna 0 (não acionado) ou 1 (acionado)
    }

    // Função para verificar se o sensor de movimento foi acionado (simulação)
    function verificarSensorInvasao() {
        // Implemente a lógica real para verificar o sensor de movimento aqui
        // Neste exemplo, vamos simular que o sensor é acionado aleatoriamente
        //invasao=ligar_alarme, trancar_portas_janelas, chamar_policia, ativar_alerta_proprietario
        return rand(0, 1); // Retorna 0 (não acionado) ou 1 (acionado)
    }

    function verificarSensorFaltaEnergia() {
        // Implemente a lógica real para verificar o sensor de temperatura aqui
        // Neste exemplo, vamos simular que o sensor é acionado aleatoriamente
        //falta_energia=ligar_luzes_emergencia, alerta_cemig, alerta_proprietário
        return rand(0, 1); // Retorna 0 (não acionado) ou 1 (acionado)
    }

	//ATIVIDADE
	 function verificarSensorVazamentoAgua() {
        // Implemente a lógica real para verificar o sensor de porta aberta aqui
        // Neste exemplo, vamos simular que o sensor é acionado aleatoriamente
        //vazamento_agua=fechar_registro, enviar_alerta, abrir_ralos
        return rand(0, 1); // Retorna 0 (não acionado) ou 1 (acionado)
    }
    
    // Função para ler as regras do arquivo
    function lerRegras() {
        $regras = [];

        // Abre o arquivo de regras
        $arquivo = fopen("rules.txt", "r");
        if ($arquivo) {
            // Lê cada linha do arquivo
            while (($linha = fgets($arquivo)) !== false) {
                // Divide a linha em sensor e atuador
                $partes = explode("=", $linha);
                $sensor = trim($partes[0]);
                $atuador = trim($partes[1]);

                // Adiciona a regra ao array de regras
                $regras[$sensor] = $atuador;
            }

            // Fecha o arquivo
            fclose($arquivo);
        } else {
            echo "<p>Erro ao abrir o arquivo de regras.</p>";
        }

        return $regras;
    }

    // Função para acionar o atuador correspondente
    function acionarAtuador($atuador) {
        // Implemente o código para acionar o atuador aqui
        // Neste exemplo, vamos apenas imprimir uma mensagem
        echo "<p>Atuador acionado: $atuador</p>";
    }

    // Inicializa um array para armazenar quais sensores foram acionados
    $sensores_acionados = [];

    if (verificarSensorVazameentoGases()) {
        $sensores_acionados[] = 'vazamento_gas';
    }

    // Verifica se o sensor de fumaça foi acionado
    if (verificarSensorFumaca()) {
        $sensores_acionados[] = 'fumaça';
    }

    // Verifica se o sensor de movimento foi acionado
    if (verificarSensorInvasao()) {
        $sensores_acionados[] = 'invasao';
    }

    if (verificarSensorFaltaEnergia()) {
        $sensores_acionados[] = 'falta_energia';
    }
	
	// ATIVIDADE
    if (verificarSensorVazamentoAgua()) {
        $sensores_acionados[] = 'vazamento_agua';
    }

    // Se algum sensor foi acionado, exibe a mensagem
    if (!empty($sensores_acionados)) {
        echo "<p>Sensores acionados: " . implode(', ', $sensores_acionados) . "</p>";
    } else {
        echo "<p>Nenhum sensor foi acionado.</p>";
    }

    // Lê as regras do arquivo
    $regras = lerRegras();

    // Percorre os sensores acionados e executa os atuadores correspondentes
    foreach ($sensores_acionados as $sensor) {
        // Verifica se existe uma regra para o sensor atual
        if (isset($regras[$sensor])) {
            // Aciona o atuador correspondente à regra
            acionarAtuador($regras[$sensor]);
        } else {
            echo "<p>Nenhuma regra encontrada para o sensor $sensor.</p>";
        }
    }
    ?>
</div>

</body>
</html>
