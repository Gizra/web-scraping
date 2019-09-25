<?php

namespace Drupal\server_job_scrape\Plugin\QueueWorker;

use Drupal\Core\Queue\QueueWorkerBase;

/**
 * Updates a feed's items.
 *
 * @QueueWorker(
 *   id = "server_job_scrape_feeds",
 *   title = @Translation("Job refresh"),
 *   cron = {"time" = 10}
 * )
 */
class JobRefresh extends QueueWorkerBase {

  /**
   * {@inheritdoc}
   */
  public function processItem($data) {
    $scrapers = \Drupal::service('plugin.manager.server_job_scraper');
    foreach ($scrapers->getDefinitions() as $plugin_id => $scraper_type) {
      $plugin = $scrapers->createInstance($plugin_id, []);
      if ($plugin::isSupported($data)) {
        try {
          $plugin->processItem($data);
        }
        catch (\Exception $e) {
          \Drupal::logger('server_job_scrape')->error('@url failed: @error ; @file : @line', [
            '@url' => $data,
            '@error' => $e->getMessage(),
            '@file' => $e->getFile(),
            '@line' => $e->getLine(),
          ]);
        }
        break;
      }

    }
  }

}
