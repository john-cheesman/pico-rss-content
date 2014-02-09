# Pico RSS Content
v0.2.0

A simple RSS plugin for [Pico](http://pico.dev7studios.com), import content into any template.

Add rss-content to your plugins directory, set your feed and access the array in a template.

## Set your RSS feed in config.php
    $config['rss_feed'] = 'http://myfeed.com';
## Setup a loop in your template
    {% for item in rss_content %}
        <h2><a href="{{ item.link }}">{{ item.title }}</a></h2>
    {% endfor %}
## Properties
- title
- link
- date (formatted by `$config['date_format']`)
- desc (description)
