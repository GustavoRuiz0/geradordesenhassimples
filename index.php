<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gerador de Senhas</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div id="password-generator">
        <h1>Gerador de Senhas</h1>
        <form action="" method="post">
            <label for="length">Comprimento da Senha:</label>
            <input type="number" name="length" id="length" min="1" max="50" value="">
            <input type="submit" value="Gerar Senha">
        </form>
        <div id="password"></div>
    </div>

    <div id="password-result">

    </div>

    <?php
    $senha = '';
    $tamanho = filter_input(INPUT_POST, 'length');
    $chars_set = array();
    $chars_set = array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9));
    shuffle($chars_set);

    for ($i = 0; $i < $tamanho; $i++) {
        $rand = array_rand($chars_set);
        $senha .= $chars_set[$rand];
    }
    ?>

    <center>
        <h1>SENHA GERADA</h1>
        <h1><?php echo $senha?></h1>
        <button class="button"onclick="copyToClipboard('<?php echo $senha?>')">Copiar Senha</button>
    </center>

    <script>
        function copyToClipboard(text) {
            const input = document.createElement('textarea');
            input.style.position = 'fixed';
            input.style.opacity = 0;
            input.value = text;
            document.body.appendChild(input);
            input.select();
            document.execCommand('Copy');
            document.body.removeChild(input);
            alert('Senha copiada para a área de transferência!');
        }
    </script>

</body>

</html>
