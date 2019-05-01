<?php

namespace model;

class User extends \phersistent\Phersistent {

  public $name = self::TEXT;
  public $email = self::TEXT;
  public $birthdate = self::DATE;

  public $usertype = self::TEXT;
  public $company = self::TEXT;
  public $position = self::TEXT;

  public $changePassword = self::INT; // BOOLEAN

  public $username = self::TEXT;
  public $password = self::TEXT;
  public $cookie = self::TEXT;
  public $ip = self::TEXT;
  public $session = self::TEXT;

  public $lastAccess = self::DATETIME;

  public $facebook = self::TEXT;
  public $linkedin = self::TEXT;
  public $twitter = self::TEXT;
  public $country = self::TEXT;

  public $table = "cms_user";

}

?>
