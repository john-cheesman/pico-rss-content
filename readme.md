# Pico RSS Content
v1.0.2

A simple RSS plugin for [Pico](http://pico.dev7studios.com), import content into any template.

Add rss-content to your plugins directory, set your feed and access the array in a template.

## Installation
1. Download the files and move to `plugins/rss-content`
2. Add the fee URL to `config.php`
    $config['rss_feed'] = 'http://myfeed.com';
3. Setup a loop in your template
    {% for item in rss_content %}
        <h2><a href="{{ item.link }}">{{ item.title }}</a></h2>
        <time>{{ item.date }}</time>
        <p>{{ item.description }}</p>
    {% endfor %}
## Properties
- title
- link
- date (formatted by `$config['date_format']`)
- description

## Changelog
- v1.0.2 - updated readme
- v1.0.1 - added MIT license
- v1.0.0 - initial release
