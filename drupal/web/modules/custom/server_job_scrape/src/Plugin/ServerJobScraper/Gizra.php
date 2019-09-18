<?php

namespace Drupal\server_job_scrape\Plugin\UnJobScraper;

use Drupal\server_job_scrape\ServerJobXmlWriter;
use Drupal\server_job_scrape\ServerJobScraperBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Scrapes jobs from gizra.com.
 *
 * @UnJobScraper(
 *   id = "gizra",
 *   title = @Translation("Gizra.com site"),
 * )
 */
class Gizra extends ServerJobScraperBase {

  use ServerJobXmlWriter;

  const BASE_URL = 'https://www.gizra.com';

  /**
   * {@inheritdoc}
   */
  public function processItem($url) {

  }

  /**
   * Creates an instance of the plugin.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   *   The container to pull out services used in the plugin.
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin ID for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   *
   * @return static
   *   Returns an instance of this plugin.
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new self();
  }

  /**
   * Gets the plugin_id of the plugin instance.
   *
   * @return string
   *   The plugin_id of the plugin instance.
   */
  public function getPluginId() {
    return 'gizra';
  }

  /**
   * Gets the definition of the plugin implementation.
   *
   * @return array
   *   The plugin definition, as returned by the discovery object used by the
   *   plugin manager.
   */
  public function getPluginDefinition() {
    return [];
  }

  /**
   * {@inheritdoc}
   */
  public static function isSupported($url) {
    return (bool) strstr($url, 'gizra.com') !== FALSE;
  }

}
