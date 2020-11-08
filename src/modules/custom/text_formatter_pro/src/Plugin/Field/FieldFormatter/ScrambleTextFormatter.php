<?php

namespace Drupal\text_formatter_pro\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'text_format' formatter.
 *
 * @FieldFormatter(
 *   id = "field_formatter_scramble_text",
 *   label = @Translation("Scramble Text Field"),
 *   field_types = {
 *     "string",
 *     "text",
 *   }
 * )
 */

class ScrambleTextFormatter extends FormatterBase
{
  public function viewElements(FieldItemListInterface $items, $langcode)
  {
    $elements = [];

    foreach ($items as $index => $item) {
      $result = str_shuffle($item->value);
      $elements[$index] = ["#markup" => $result];
    }

    return $elements;
  }
}
