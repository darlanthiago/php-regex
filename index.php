<?php require_once "./regex.php"; ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Expressões Regulares</title>

  <style>
    body {
      background: #2f3542;
      font-family: Arial, Helvetica, sans-serif;
    }

    .container {
      margin: 0 auto;
      display: flex;
      justify-content: center;
      align-items: center;
      background: #fff;
      border-radius: 4px;
      margin-top: 80px;
      opacity: 0.9;
      height: 300px;
      width: 300px;
      padding: 20px 30px 50px 30px;

    }

    h1 {
      color: #ff4757;
    }


    form {
      display: flex;
      flex-direction: column;
    }


    form label {
      color: #2f3542;
      margin-top: 10px;

    }

    form input {
      height: 30px;
      border-radius: 8px;
      padding: 0 10px;
      border: none;
      background: #dfe4ea;
      outline: 0;
    }

    form span {
      font-size: 12px;
    }

    form button {
      display: flex;
      background: #ff4757;
      color: #fff;
      font-weight: bold;
      border: none;
      padding: 10px;
      width: 100%;
      border-radius: 8px;
      justify-content: center;
      align-items: center;
      margin-top: 15px;
      cursor: pointer;

    }
  </style>

</head>

<body>

  <div class="container">

    <div class="box">
      <h1>Trabalho RegEx</h1>


      <form action="#" method="POST">

        <label for="placa_carro">Placa de Carro: </label>
        <input type="text" name="placa_carro" id="placa_carro" value="<?= !empty($_GET['placaValue']) ? $_GET['placaValue'] : ''  ?>">

        <?php if (isset($_GET['placa'])) { ?>
          <?php if ($_GET['placa'] == 1) { ?>
            <span style="color: #2ed573">*Placa de carro válida</span>
          <?php } else if ($_GET['placa'] == 0) { ?>
            <span style="color: #ff4757">*Placa de carro inválida</span>
          <?php } ?>
        <?php } ?>


        <label for="cpf">CPF: </label>
        <input type="text" name="cpf" id="cpf" value="<?= !empty($_GET['cpfValue']) ? $_GET['cpfValue'] : ''  ?>">
        <?php if (isset($_GET['cpf'])) { ?>
          <?php if ($_GET['cpf'] == 1) { ?>
            <span style="color: #2ed573">*CPF válido</span>
          <?php } else if ($_GET['cpf'] == 0) { ?>
            <span style="color: #ff4757">*CPF inválido</span>
          <?php } ?>
        <?php } ?>

        <label for="email">E-mail: </label>
        <input type="text" name="email" id="email" value="<?= !empty($_GET['emailValue']) ? $_GET['emailValue'] : ''  ?>">
        <?php if (isset($_GET['email'])) { ?>
          <?php if ($_GET['email'] == 1) { ?>
            <span style="color: #2ed573">*E-mail válido</span>
          <?php } else if ($_GET['email'] == 0) { ?>
            <span style="color: #ff4757">*E-mail inválido</span>
          <?php } ?>
        <?php } ?>

        <button type="submit">Enviar</button>

      </form>

    </div>
  </div>

</body>

</html>