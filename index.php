<!DOCTYPE html>
<html>
<head>
	<title>Conta Corrente</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel="stylesheet" type="text/javascript" href="script.js">
</head>
<body>
	<div id="container">
		
		<div id="inicio">
			<h1>Bem-vindo, Fulano</h1>
			<h1>Seu saldo atual é R$0,00</h1>
			<h1><b>Nova operação</b></h1>
			<pre><?php
			$address = "127.0.0.1";
            $service_port = 80;

            $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
            if ($socket === false) {
            echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
            }

            // echo "Attempting to connect to '$address' on port '$service_port'...";
            $result = socket_connect($socket, $address, $service_port);
            if ($result === false) {
            echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
            }

            $operacao = isset($_GET["operacao"]) && $_GET["operacao"] != "" ? $_GET["operacao"] : "SALDO";
            $in = $operacao;
            if ($operacao == "DEBITO" || $operacao == "CREDITO") {
	        $valor = $_GET["valor"];
	        $in .= " " . $valor;
            }
            $in .= "\n";
            socket_write($socket, $in, strlen($in));

            $out = socket_read($socket, 2048);

            if ($operacao == "Atualizar Saldo") {
	        echo "Atualizar Saldo: " . $out;
            } else {
	        echo "Realizar Operação: " . $out;	
            }

            socket_close($socket);

            ?></pre>
            <h2>Operação</h2>
			<form name="form1" action="." method="GET">
			<input type="radio" name="conta" id="debito1" value="debito" checked="">
			<label for="debito1">Débito</label>
			<br><br>
			<input type="radio" name="conta" id="credito1" value="1">
			<label for="credito1">Crédito</label>
			<h2>Valor</h2>
			<input autofocus onfocus="this.select()" type="number" name="valor" value="0" />
			<br><br>
			<input type="submit" name="operacao" value="Realizar Operação" />
			<input type="submit" name="operacao" value="Atualizar Saldo" />
			</form>
			<br><br>
			<h1>Operação realizada com sucesso. Saldo Atual <code>R$ <?php echo $operacao ?></code></h1>
		</div>
	</div>
	
	<div>
		<h3>Equipe: Regiane Mayara Viana Ferraz, Sabrina Nazaré Ferreira</h3>
		<h3>Redes de Computadores</h3>
		<h3>TIINT - IFPR TB</h3>
		<h3>2018</h3>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
</body>
</html>