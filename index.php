<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $salarioMinimo = 1380;
        $salario = $_GET["salario"] ?? 0;
        $total = (int) ($salario / $salarioMinimo);
        $resto = $salario % $salarioMinimo;

        $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
    ?>
    <main>
        <h1>Informe seu Salário</h1>
        <form action="<?=$_SERVER["PHP_SELF"]?>" method="get">
            <label for="">Salário (R$)</label>
            <input type="number" name="salario" id="" step="0.01">
            <label for="">Considerando o salário mínimo de <strong><?=numfmt_format_currency($padrao, $salarioMinimo, "BRL")?></strong></label>
            <input type="submit" value="Calcular">
        </form>
    </main>

    <section>
        <h2>Resultado Final</h2>
        <p>Quem recebe um salário de <?=numfmt_format_currency($padrao, $salario, "BRL")?> ganha <strong><?=number_format($total, 0, ',', '.')?> salários minímos</strong> + <?=numfmt_format_currency($padrao, $resto, "BRL")?></p>
    </section>
</body>
</html>