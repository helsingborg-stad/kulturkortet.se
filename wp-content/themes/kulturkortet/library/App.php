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
    }
}
