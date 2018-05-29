<?php

/* Format article */
if(!function_exists('format_post_content')) {
    function format_post_content($content)
    {
        $content = html_entity_decode($content);
        $content = strip_tags($content, '<a><p>');
        $content = preg_replace('/<\/p>/i', '</p><!--more -->', $content, 1);
        return $content;
    }
}

/* Download images in post */
if(!function_exists('get_images')) {
    function get_images($content)
    {
        $result = array();
        $regex = '/https?\:\/\/[^\" ]+/i';
        preg_match_all($regex, $content, $matches);
        $matches = array_pop($matches);
        if($matches && is_array($matches) && !empty($matches)) {
            foreach($matches as $match) {
                if(in_array(substr($match, -3), array('png', 'jpg'))) {
                    $result[] = $match;
                }
            }
        }

        if(is_array($result) && !empty($result)) {
            return implode(", ", $result);
        }

        return "";
    }
}