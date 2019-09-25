<?php

namespace Drupal\server_job_scrape;

/**
 * Common parts of a job scraper plugin.
 *
 * @package Drupal\server_job_scrape
 */
abstract class ServerJobScraperBase implements ServerJobScraperInterface {

  /**
   * Processes the given URL and saves the data to the filesystem.
   *
   * @param string $url
   *   Job listing URL.
   */
  abstract public function processItem($url);

  /**
   * Checks if the given URL can be scraped or not.
   *
   * @param string $url
   *   Job listing URL.
   *
   * @return bool
   *   TRUE if the scraper is able to scrape the given URL.
   */
  abstract public static function isSupported($url);

  /**
   * Returns the file URI for the destination.
   *
   * @return string
   *   The stream wrapper URI.
   */
  protected function getFileUri() {
    return 'public://' . $this->getPluginId() . '.xml';
  }

  /**
   * Checks if the XML is already created.
   */
  public function xmlExists() {
    return file_exists(\Drupal::service('file_system')
      ->realpath($this->getFileUri()));
  }

}
