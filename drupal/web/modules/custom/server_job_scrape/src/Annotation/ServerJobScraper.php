<?php

namespace Drupal\server_job_scrape\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a reusable Server Job Scraper plugin annotation object.
 *
 * @Annotation
 */
class ServerJobScraper extends Plugin {

  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The name of the form plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $name;

}
