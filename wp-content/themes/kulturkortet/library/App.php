<?php
namespace Kulturkortet;

class App
{
    public function __construct()
    {
        new \Kulturkortet\Theme\Enqueue();
        new \Kulturkortet\Theme\ModuleScopes();
    }
}
