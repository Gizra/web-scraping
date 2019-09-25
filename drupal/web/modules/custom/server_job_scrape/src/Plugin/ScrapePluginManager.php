<?php

namespace Drupal\server_job_scrape\Plugin;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;

/**
 * Manages scrape plugins.
 *
 * @ingroup server_job_scraper
 */
class ScrapePluginManager extends DefaultPluginManager {

  /**
   * {@inheritdoc}
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
    parent::__construct('Plugin/ServerJobScraper', $namespaces, $module_handler, 'Drupal\server_job_scrape\ServerJobScraperInterface', 'Drupal\server_job_scrape\Annotation\ServerJobScraper');
    $this->alterInfo('server_job_scraper_info');
    $this->setCacheBackend($cache_backend, 'server_job_scraper');
  }

}
