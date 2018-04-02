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

  public function updateRekening($nr, $waarde){
    global $db;

    $sql = "UPDATE fn_rekeningen SET waarde = waarde + $waarde ";
    $sql .= "WHERE rekeningNummer = '$nr'";

    $result = mysqli_query($db, $sql);
    if ($result) {
      return $result;
    } else {
      echo mysqli_error($db) . ". Please try again.";
      db_disconnect($db);
      exit;
    }
  }

    public function getRekeningTransacties($reknr){
      global $db;

      $sql = "SELECT * FROM fn_transacties ";
      $sql .= "WHERE vanRekening = $reknr OR naarRekening = $reknr ";
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);

      $transacties = [];

      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          $transactie = new Transactie();
          $transactie->vanRekening = $row['vanRekening'];
          $transactie->naarRekening = $row['naarRekening'];
          $transactie->waarde = $row['waarde'];
          $transactie->timestamp = $row['timestamp'];
          $transactie->opmerking = $row['opmerking'];

          $transacties[] = $transactie;
        }
      }

      $transacties = json_encode($transacties);
      return $transacties;
    }

  public function createTransactie($obj){
    global $db;

    $sql = "INSERT INTO fn_transacties ";
    $sql .= "(vanRekening, naarRekening, vanBankCode, naarBankCode, waarde, timestamp, opmerking) ";
    $sql .= "VALUES ('$obj->vanRekening', '$obj->naarRekening', '$obj->vanBankCode', ";
    $sql .= "'$obj->naarBankCode', '$obj->waarde', '$obj->timestamp', '$obj->opmerking')";

    $result = mysqli_query($db, $sql);
    if ($result) {
      $this->updateRekening($obj->vanRekening, -$obj->waarde);
      $this->updateRekening($obj->naarRekening, $obj->waarde);
      return $db->insert_id;
    } else {
      echo mysqli_error($db) . ". Please try again.";
      db_disconnect($db);
      exit;
    }
  }
}


 ?>
