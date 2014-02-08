<?php

/**
 * RSS Content *
 * @package Pico
 * @subpackage RSS Content
 * @version 0.1.0
 * @author John Cheesman <info@johncheesman.org.uk>
 *
 */
class Rss_Content {

    public function __construct() {

    }

    /**
     * Get the settings from config.php
     * @return array
     */
    public function config_loaded(&$settings) {

        $this->config = $settings;

    }

    /**
     * Set the twig variable
     * @return array
     */
    public function before_render(&$twig_vars, &$twig) {

        $twig_vars['rss_content'] = $this->rss_content();

    }

    /**
     * Get the rss data and set the array
     * @return array
     */
    private function rss_content() {

        // include the config
        $config = $this->config;

        // get the feed url
        if (isset($config['rss_feed'])) {
            $url = $config['rss_feed'];
        }

        // build the array
        $rss = new DOMDocument();
        $rss->load($url);
        $feed = array();

        foreach ($rss->getElementsByTagName('item') as $node) {
            $item = array (
                'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
                'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
                'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
                'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
            );

            array_push($feed, $item);
        }

        return $feed;

    }

}
