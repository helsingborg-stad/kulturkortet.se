<?php
namespace Kulturkortet;

class App
{
    public function __construct()
    {
        new \Kulturkortet\Theme\Event();
        new \Kulturkortet\Theme\Enqueue();
        new \Kulturkortet\Theme\ModuleScopes();
        new \Kulturkortet\Theme\Article();
        new \Kulturkortet\Theme\Header();
        new \Kulturkortet\Theme\Sidebars();

        new \Kulturkortet\Modularity\Posts();


    }
}
