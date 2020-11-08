<?php

namespace Drupal\text_formatter_pro\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'text_format' formatter.
 *
 * @FieldFormatter(
 *   id = "field_formatter_num_chars",
 *   label = @Translation("Show Number of Characters"),
 *   field_types = {
 *     "string",
 *     "text",
 *   }
 * )
 */

class NumCharsTextFormatter extends FormatterBase
{
  public function viewElements(FieldItemListInterface $items, $langcode)
  {
    $elements = [];

    foreach ($items as $index => $item) {
      $value = (string)$item->value;
      $strlen = strlen($value);
      $result = "$value ($strlen)";
      $elements[$index] = ["#markup" => $result];
    }

    return $elements;
  }
}
