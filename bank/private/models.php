<?php

class Bank {
  public $id;
  public $rekening_id;
  public $naam;
  public $locatie;
}

class Rekening {
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
      return $db->insert_id;
    } else {
      echo mysqli_error($db) . ". Please try again.";
      db_disconnect($db);
      exit;
    }
  }

  public function getUserRekeningen($id){
    global $db;

    $sql = "SELECT * FROM fn_rekeningen ";
    $sql .= "WHERE gebruiker_id = $id ";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $rekeningen = [];

    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        $rekening = new Rekening();
        $rekening->gebruiker_id = $row['gebruiker_id'];
        $rekening->rekeningNummer = $row['rekeningNummer'];
        $rekening->waarde = $row['waarde'];

        $rekeningen[] = $rekening;
      }
    }

    $rekeningen = json_encode($rekeningen);
    return $rekeningen;
  }

  public function getRekening($reknr){
    global $db;

    $sql = "SELECT * FROM fn_rekeningen ";
    $sql .= "WHERE rekeningNummer = $reknr ";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $rekeningen = [];

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();

        $rekening = new Rekening();
        $rekening->gebruiker_id = $row['gebruiker_id'];
        $rekening->rekeningNummer = $row['rekeningNummer'];
        $rekening->waarde = $row['waarde'];

    }

    $rekening = json_encode($rekening);
    return $rekening;
  }
}


 ?>
