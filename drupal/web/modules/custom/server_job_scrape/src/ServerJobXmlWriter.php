<?php

namespace Drupal\server_job_scrape;

/**
 * Scrapes a HTML page.
 */
trait ServerJobXmlWriter {

  /**
   * Saves a SimpleXML object into a file.
   *
   * @param \SimpleXMLElement $simplexml_data
   *   SimpleXML object that contains all the jobs.
   */
  public function saveXml(\SimpleXMLElement $simplexml_data) {
    $this->checkSanity($simplexml_data);
    $dom = dom_import_simplexml($simplexml_data)->ownerDocument;
    $dom->formatOutput = TRUE;
    $dom->encoding = 'utf-8';
    $dom->save($this->getFileUri());
  }

  /**
   * Checks the sanity of the XML feed and logs irregularities.
   */
  protected function checkSanity(\SimpleXMLElement $simplexml_data) {
    if ($simplexml_data->job->count() == 0) {
      \Drupal::logger('server_job_scrape')->error('The job feed is empty: @id', [
        '@id' => $this->getPluginId(),
      ]);
    }
  }

}
