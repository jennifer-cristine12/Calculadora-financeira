<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora financeira</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"
        defer></script>
</head>

<body>
    <?php
    $valor = $_POST["valor"] ?? 1;
    $regra = $_POST["regra"] ?? 0;
    date_default_timezone_set("America/Sao_paulo");
    ?>
    <main class="w-100 d-flex flex-column align-items-center justify-content-center ">
        <h1>Calculadora de regras financeiras</h1>
        <section class="input">
            <h2>Coloque o valor que recebeu hoje (<?= date("d/m/Y") ?>)</h2>
            <form action="index.php" method="post">
                <label for="valor">Quanto Recebeu (R$)</label>
                <input type="number" class="w-100" name="valor" value="<?php echo $valor; ?>"
                    placeholder="Digite o valor recebido em reais" min="0" required>
                <label for="regra">Selecione a regra de investimento</label>
                <select name="regra" class="w-100" id="regra">
                    <option value="1" selected>
                        70/30
                    </option>
                    <option value="2">
                        70/20/10
                    </option>
                    <option value="3">
                        50/30/20
                    </option>
                    <option value="4">
                        60/20/10/10
                    </option>
                </select>
                <button type="submit">
                    Enviar
                </button>
            </form>

        </section>
        <!--formulario-->
        <section class="resultados">
            <?php

            $v1 = 70; //contas
            $v2 = 50;
            $v3 = 60;

            $a1 = 30; //aproveitamento
            $a2 = 20;

            $r1 = 10; //reserva
            $ap1 = 10; //aposentadoria

            $contas = 1;
            $compras = 0;
            $reserva = 0;
            $aposentadoria = 0;

            switch ($regra) {
                case 1: // 70/30
                    $contas = $valor * ($v1 / 100);
                    $compras = $valor * ($a1 / 100);

                    break;
                case 2: // 70/20/10
                    $contas = $valor * ($v1 / 100);
                    $compras = $valor * ($a2 / 100);
                    $reserva = $valor * ($r1 / 100);
                    break;
                case 3: // 50/30/20
                    $contas = $valor * ($v2 / 100);
                    $compras = $valor * ($a1 / 100);
                    $reserva = $valor * ($r1 / 100);
                    break;
                case 4: // 60/20/10/10
                    $contas = $valor * ($v3 / 100);
                    $compras = $valor * ($a2 / 100);
                    $reserva = $valor * ($r1 / 100);
                    $aposentadoria = $valor * ($ap1 / 100);
                    break;
            }
            ?>
            <h2>Resultado da distribuição</h2>
            <ul>
                <li>O valor das contas é: <strong>R$ <?= number_format($contas, 2, ',', '.') ?></strong></li>
                <li>O valor das compras é: <strong>R$ <?= number_format($compras, 2, ',', '.') ?></strong></li>
                <li>O valor da reserva é: <strong>R$ <?= number_format($reserva, 2, ',', '.') ?></strong></li>
                <li>O valor da aposentadoria é: <strong>R$ <?= number_format($aposentadoria, 2, ',', '.') ?></strong>
                </li>
            </ul>

        </section>
        <!--Resultado-->
    </main>

</body>

</html>