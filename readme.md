# RSS Content

A simple RSS plugin for [Pico](http://pico.dev7studios.com), import content into any template.

## Add rss-content to the Pico plugins directory
## Set your RSS feed in config.php e.g.
    $config['rss_content'] = 'http://myfeed.com';
## Setup a loop in your template e.g.
    {% for item in rss_content %}
        <h2><a href="{{ item.link }}">{{ item.title }}</a></h2>
    {% endfor %}