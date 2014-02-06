<?php

/**
 * The file description. *
 * @package Pico
 * @subpackage RSS Content
 * @version 0.1.0
 * @author John Cheesman <info@johncheesman.org.uk>
 *
 */
class Rss_Content {

    public function __construct() {

    }

    public function before_load_content(&$file) {

        if (file_exists($file))
            $this->content = file_get_contents($file);
    }

    public function config_loaded(&$settings) {

        $this->config = $settings;
        if (isset($settings['rss_feed']))
            $this->feed = $settings['rss_feed'];
    }

    public function before_render(&$twig_vars, &$twig) {

        $twig_vars['rss_content'] = $this->rss_content();
        //var_dump($this->rss_content());
    }

    /**
     * Grab the file meta here
     * @return string
     */
    private function rss_content() {

        //include the config
        $config = $this->config;


        if (isset($config['rss_feed']))
            $feedPath = $config['rss_feed'];

        $rss = new DOMDocument();
        $rss->load($feedPath);
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
