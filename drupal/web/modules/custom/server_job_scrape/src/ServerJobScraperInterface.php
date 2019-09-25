<?php

namespace Drupal\server_job_scrape;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Component\Plugin\PluginInspectionInterface;

/**
 * Defines a job scraper plugin.
 *
 * @package Drupal\server_job_scrape
 */
interface ServerJobScraperInterface extends PluginInspectionInterface, ContainerFactoryPluginInterface {

  /**
   * Processes the given URL and saves the data to the filesystem.
   *
   * @param string $url
   *   Job listing URL.
   */
  public function processItem($url);

  /**
   * Checks if the given URL can be scraped or not.
   *
   * @param string $url
   *   Job listing URL.
   *
   * @return bool
   *   TRUE if the scraper is able to scrape the given URL.
   */
  public static function isSupported($url);

}
