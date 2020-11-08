<?php

namespace Drupal\text_formatter_pro\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\text_formatter_pro\Service\StringManipulator;

/**
 * Plugin implementation of the 'text_format' formatter.
 *
 * @FieldFormatter(
 *   id = "field_formatter_rot13",
 *   label = @Translation("Translate via Rotation13"),
 *   field_types = {
 *     "string",
 *     "text",
 *   }
 * )
 */

class Rot13TextFormatter extends FormatterBase
{
  public function viewElements(FieldItemListInterface $items, $langcode)
  {
    $elements = [];

    foreach ($items as $index => $item) {
      $value = (string)$item->value;
      $result = \Drupal::service('string_manipulator')->rot13($value);
      $elements[$index] = ["#markup" => $result];
    }

    return $elements;
  }
}
