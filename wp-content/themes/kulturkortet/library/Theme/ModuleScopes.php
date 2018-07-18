<?php

namespace Kulturkortet\Theme;

class ModuleScopes
{
    public function __construct()
    {
        add_filter('Modularity/Editor/ModuleCssScope', array($this, 'addModuleScopes'));
        add_filter('acf/load_field/key=field_571dfd4c0d9d9', array($this, 'addPostTemplates'));
    }

    /**
     * Adds style scope classes
     * @return array
     */
    public function addModuleScopes($scopes)
    {
        $scopes['mod-posts'] = array(
            's-card-sales' => __("Card sales", 'kulturkortet')
        );

        $scopes['mod-slider'] = array(
            's-slider-padded' => __("Slider padded", 'kulturkortet')
        );

        return $scopes;
    }

    /**
     * Add custom view values
     * @param $field
     * @return mixed
     */
    public function addPostTemplates($field)
    {
        $field['choices']['selected-events'] = __('Selected events', 'kulturkortet');
        return $field;
    }
}
