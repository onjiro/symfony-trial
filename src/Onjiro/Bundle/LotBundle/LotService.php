<?php
namespace Onjiro\Bundle\LotBundle;

class LotService
{
    public function __construct($factory)
    {
        $this->factory = $factory;
    }

    public function draw($id)
    {
        $this->factory->build($id)->draw();
    }
}