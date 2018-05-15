<?php

namespace Kulturkortet\Theme;

class ModuleScopes
{
    public function __construct()
    {
        add_filter('Modularity/Editor/ModuleCssScope', array($this, 'addModuleScopes'));
    }

    /**
     * Adds style scope classes
     * @return array
     */
    public function addModuleScopes($scopes)
    {
        $scopes['mod-posts'] = array(
            's-buy-card' => __("Select a card", 'kulturkortet')
        );

        return $scopes;
    }
}
