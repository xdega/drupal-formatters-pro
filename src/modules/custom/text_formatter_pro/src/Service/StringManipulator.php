<?php

namespace Drupal\text_formatter_pro\Service;

/**
 * The StringManipulator Class is used to encapsulate functionality that
 * modifies strings.
 */
class StringManipulator
{
  /**
   * Converts a String to Slug Format
   * 
   * @return string
   *   String converted to Slug
   */
  public function slugify($str)
  {
    /*
      I am opting not to use a third-party package in order to simply create a 
      slug. This is wildly unnecessary, time-consuming, and creates a dependency 
      need with little gain if any.

      For clarity, if I were to use a third party dependency, I would include it
      in the composer.json at the Drupal project root, and then include it at
      the top of this file.
    */
    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $str)));
  }

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
      if (!preg_match('/^[A-Za-z]+$/m', $char)) $output .= $char;

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
