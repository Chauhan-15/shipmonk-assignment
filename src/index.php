<?php

namespace Akanksha\ShipMonk;

require_once __DIR__ . '/../vendor/autoload.php';

use Akanksha\ShipMonk\LinkedList;

$list = LinkedList::init();

$list->add(1);
$list->add(2);
$list->add(3);
$list->add(4);
$list->add(5);
