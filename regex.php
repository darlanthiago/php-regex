<?php


if (!empty($_POST)) {


  $placa_carro = addslashes($_POST['placa_carro']);
  $cpf = addslashes($_POST['cpf']);
  $email = addslashes($_POST['email']);


  function validate($placa_carro, $cpf, $email)
  {

    $messages = [];

    if (preg_match('/^[A-Z]{3}\-[0-9]{4}$/', $placa_carro)) {
      $messages['placa_carro'] = 1;
    } else {
      $messages['placa_carro'] = 0;
    }

    if (strlen($cpf) >= 11 || strlen($cpf) <= 14) {

      $cpf_formatted = preg_replace('/^([0-9]{3})([0-9]{3})([0-9]{3})([0-9]{2})$/', '$1.$2.$3-$4', $cpf);

      if (preg_match('/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-([0-9]{2})$/', $cpf_formatted)) {

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
