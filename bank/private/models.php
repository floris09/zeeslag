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

 ?>
