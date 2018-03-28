<?php

class Bank {
  public $id;
  public $rekening_id;
  public $naam;
  public $locatie;
}

class Rekening {
  public $id;
  public $gebruiker_id;
  public $rekeningNummer;
  public $waarde;
}

class Transactie {
  public $id;
  public $vanRekening;
  public $naarRekening;
  public $vanBankCode;
  public $naarBankCode;
  public $timestamp;
  public $waarde;
  public $opmerking;
}

class User {
  public $id;
  public $bank_id;
  public $voornaam;
  public $achternaam;
  public $bsn;
  public $geboorteDatum;
  public $adres;
  public $username;
  public $password;
  public $emailAdres;
  public $admin;
}

class MegaDAO {

  public function createRekening($obj){
    global $db;

    $sql = "INSERT INTO fn_rekeningen ";
    $sql .= "(gebruiker_id, waarde) VALUE ('$obj->gebruiker_id', '$obj->waarde')";

    $result = mysqli_query($db, $sql);
    if ($result) {
      echo $db->insert_id;
    } else {
      echo mysqli_error($db) . ". Please try again.";
      db_disconnect($db);
      exit;
    }
  }

}

 ?>
