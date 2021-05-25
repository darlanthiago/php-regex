<?php


if (!empty($_POST)) {


  $placa_carro = addslashes($_POST['placa_carro']);
  $cpf = addslashes($_POST['cpf']);
  $email = addslashes($_POST['email']);

  function mod11($numDado, $numDig = 2, $limMult = 12, $x10 = true)
  {

    if (!$x10) $numDig = 1;
    $dado = $numDado;
    for ($n = 1; $n <= $numDig; $n++) {
      $soma = 0;
      $mult = 2;
      for ($i = strlen($dado) - 1; $i >= 0; $i--) {
        $soma += $mult * intval(substr($dado, $i, 1));
        if (++$mult > $limMult) $mult = 2;
      }
      if ($x10) {
        $dig = fmod(fmod(($soma * 10), 11), 10);
      } else {
        $dig = fmod($soma, 11);
        if ($dig == 10) $dig = "X";
      }
      $dado .= strval($dig);
    }
    return substr($dado, strlen($dado) - $numDig);
  }



  function validate($placa_carro, $cpf, $email)
  {

    $messages = [];

    if (preg_match('/^[A-Z]{3}\-[0-9]{4}$/', $placa_carro)) {
      $messages['placa_carro'] = 1;
    } else {
      $messages['placa_carro'] = 0;
    }

    if (strlen($cpf) >= 11 || strlen($cpf) <= 14) {

      $cpf_formatted = preg_replace('/[^0-9]/', '', $cpf);

      $cpf_split = str_split($cpf_formatted);

      $digit = $cpf_split[9] . $cpf_split[10];

      $cpf_to_validade = array_slice($cpf_split, 0, 9);
      $cpf_to_validade = (string) implode($cpf_to_validade);

      $validated = mod11($cpf_to_validade);

      if ($validated === $digit) {
        $messages['cpf'] = 1;
      } else {
        $messages['cpf'] = 0;
      }
    } else {
      $messages['cpf'] = 0;
    }

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $messages['email'] = 1;
    } else {
      $messages['email'] = 0;
    }

    return $messages;
  }


  $validate = validate($placa_carro, $cpf, $email);

  header(
    "Location: index.php?placa=" .
      $validate['placa_carro'] . "&&placaValue=" . $placa_carro .
      "&&cpf=" . $validate['cpf'] . "&&cpfValue=" . $cpf .
      "&&email=" . $validate['email'] . "&&emailValue=" . $email
  );
}
