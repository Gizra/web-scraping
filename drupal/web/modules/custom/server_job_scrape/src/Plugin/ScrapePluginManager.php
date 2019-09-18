<?php

namespace Drupal\server_job_scrape\Plugin;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;

/**
 * Manages scrape plugins.
 *
 * @ingroup un_job_scraper
 */
class ScrapePluginManager extends DefaultPluginManager {

  /**
   * {@inheritdoc}
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
    parent::__construct('Plugin/UnJobScraper', $namespaces, $module_handler, 'Drupal\server_job_scrape\ServerJobScraperInterface', 'Drupal\server_job_scrape\Annotation\ServerJobScraper');
    $this->alterInfo('un_job_scraper_info');
    $this->setCacheBackend($cache_backend, 'un_job_scraper');
  }

}
