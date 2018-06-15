<?php
namespace Kulturkortet\Theme;

class Event
{
    public function __construct()
    {
        add_filter('acf/load_field/name=archive_event_post_style', 'eventArchiveTemplate', 10, 3);
    }

    public function eventArchiveTemplate($field)
    {
        $field['choices']['kultur-event'] = 'Kulturkort Event';

        return $field;
    }
}
