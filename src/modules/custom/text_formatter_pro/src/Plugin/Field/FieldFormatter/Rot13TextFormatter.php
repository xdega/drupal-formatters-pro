<?php

namespace Drupal\text_formatter_pro\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\text_formatter_pro\Service\StringManipulator;
use Symfony\Component\DependencyInjection\ContainerInterface;

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
class Rot13TextFormatter extends FormatterBase implements ContainerFactoryPluginInterface
{
  /**
   * String Manipulation Service.
   * 
   * @var Drupal\text_formatter_pro\Service\StringManipulator
   */
  protected $stringManipulator;

  /** {@inheritdoc} */
  public function __construct($plugin_id, $plugin_definition, FieldDefinitionInterface $field_definition, array $settings, $label, $view_mode, array $third_party_settings, StringManipulator $string_manipulator)
  {
    parent::__construct($plugin_id, $plugin_definition, $field_definition, $settings, $label, $view_mode, $third_party_settings);

    $this->stringManipulator = $string_manipulator;
  }

  /** {@inheritdoc} */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition)
  {
    return new static(
      $plugin_id,
      $plugin_definition,
      $configuration['field_definition'],
      $configuration['settings'],
      $configuration['label'],
      $configuration['view_mode'],
      $configuration['third_party_settings'],
      $container->get('string_manipulator')
    );
  }

  public function viewElements(FieldItemListInterface $items, $langcode)
  {
    $elements = [];

    foreach ($items as $index => $item) {
      $value = (string)$item->value;
      $result = $this->stringManipulator->rot13($value);
      $elements[$index] = ["#markup" => $result];
    }

    return $elements;
  }
}
