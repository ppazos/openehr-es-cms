<?php

namespace basic;

class BasicString {

  static function startsWith($haystack, $needle)
  {
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
  }

  static function endsWith($haystack, $needle)
  {
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }
    return (substr($haystack, -$length) === $needle);
  }

  static function removePrefix($str, $prefix)
  {
    if (substr($str, 0, strlen($prefix)) == $prefix) // if it is prefix
    {
      $str = substr($str, strlen($prefix));
    }

    return $str;
  }

  static function removeSuffix($str, $suffix)
  {
    if (self::endsWith($str, $suffix))
    {
      return substr($str, 0, strlen($str)-strlen($suffix));
    }
    return $str;
  }

  static function generate_uuid()
  {
  	return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
  		mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
  		mt_rand( 0, 0xffff ),
  		mt_rand( 0, 0x0fff ) | 0x4000,
  		mt_rand( 0, 0x3fff ) | 0x8000,
  		mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
  	);
  }
}

?>
