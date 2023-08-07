<?php

namespace Akanksha\ShipMonk\Interfaces;

class Node
{
    /**
     * Value of the node
     * @var int | string
     */
    public $value;

    /**
     * Next node
     * @var null | self
     */
    public $next;

    /**
     * Node constructor
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
        $this->next = null;
    }
}
