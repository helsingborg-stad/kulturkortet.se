<?php
namespace Kulturkortet;

class App
{
    public function __construct()
    {
        new \Kulturkortet\Theme\Enqueue();
    }
}
