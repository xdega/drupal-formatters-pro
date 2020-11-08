<?php

namespace Drupal\text_formatter_pro\Service;

/**
 * The StringManipulator Class is used to encapsulate functionality that
 * modifies strings.
 */
class StringManipulator
{
  /**
   * Converts a String to Rotation13
   * 
   * @return string
   *   String converted to Rotation13
   */
  public function rot13($str)
  {
    $chars = str_split($str);
    $output = "";

    foreach ($chars as $char) {
      if (!preg_match('/^[A-Za-z0-9]+$/m', $char)) $output .= $char;

      $ascii = ord($char);
      $isUppercase = ctype_upper($char);
      $isLowercase = ctype_lower($char);

      if ($char >= 'M' && $isUppercase || $char > 'm' && $isLowercase) {
        $output .= chr($ascii - 13);
      } else if ($char <= 'M' && $isUppercase || $char < 'm' && $isLowercase) {
        $output .= chr($ascii + 13);
      }
    }

    return $output;
  }
}
