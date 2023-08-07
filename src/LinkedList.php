<?php

namespace Akanksha\ShipMonk;

use Akanksha\ShipMonk\Interfaces\Node;
use Akanksha\ShipMonk\Interfaces\LinkedListInterface;

class LinkedList implements LinkedListInterface
{
    /**
     * The head of the LinkedList.
     * @var null | Node
     */
    private $head;

    /**
     * The tail of the LinkedList.
     * @var null | Node
     */
    private $tail;

    /**
     * The count of the LinkedList.
     * @var int
     */
    private $count;

    /**
     * LinkedList constructor.
     */
    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
        $this->count = 0;
    }

    /**
     * Initialize a new LinkedList.
     * @return LinkedList
     */
    public static function init()
    {
        return new LinkedList();
    }

    /**
     * Return if the LinkedList is empty.
     * @return bool
     */
    public function isEmpty()
    {
        return $this->count === 0;
    }

    /**
     * Clear the LinkedList.
     * @return void
     */
    public function clear()
    {
        $this->head = null;
        $this->tail = null;
        $this->count = 0;
    }

    /**
     * Return the LinkedList as array.
     * @return array
     */
    public function toArray()
    {
        $array = [];
        $current = $this->head;
        while ($current !== null) {
            $array[] = $current->value;
            $current = $current->next;
        }
        return $array;
    }

    /**
     * Return the LinkedList as string.
     * @return string
     */
    public function toString()
    {
        return implode('', $this->toArray());
    }

    /**
     * Add a new value to the LinkedList.
     * @param $value
     * @return void
     * @throws \Exception
     */
    public function add($value)
    {
        if (!is_int($value) && !is_string($value)) {
            throw new \Exception('Value must be an integer or string');
        }
        if ($this->count > 0) {
            if (is_int($value) && is_string($this->head->value)) {
                throw new \Exception('Value must be a string');
            }
            if (is_string($value) && is_int($this->head->value)) {
                throw new \Exception('Value must be an integer');
            }
        }
        $node = new Node($value);

        if ($this->head === null) {
            $this->head = $node;
            $this->tail = $node;
            $this->count++;
            return;
        }
        $this->tail = $node;
        $current = $this->head;
        $previous = null;

        while ($current !== null && $current->value < $value) {
            $previous = $current;
            $current = $current->next;
        }

        if ($previous === null) {
            $node->next = $this->head;
            $this->head = $node;
        } else {
            $previous->next = $node;
            $node->next = $current;
        }
        $this->count++;
    }

    /**
     * Remove a value from the LinkedList.
     * @param $value
     * @return void
     */
    public function remove($value)
    {
        if ($this->head === null) {
            return;
        }

        $current = $this->head;
        $previous = null;

        while ($current !== null && $current->value !== $value) {
            $previous = $current;
            $current = $current->next;
        }

        if ($current === null) {
            return;
        }

        if ($previous === null) {
            $this->head = $current->next;
        } else {
            $previous->next = $current->next;
        }

        $this->count--;
    }

    /**
     * Check if the LinkedList contains a value.
     * @param $value
     * @return bool
     */
    public function contains($value)
    {
        if ($this->head === null) {
            return false;
        }

        $current = $this->head;

        while ($current !== null && $current->value !== $value) {
            $current = $current->next;
        }

        return $current !== null;
    }

    /**
     * Search for a value in the LinkedList.
     * @param $value
     * @return false|Node
     */
    public function search($value)
    {
        if ($this->head === null) {
            return false;
        }

        $current = $this->head;

        while ($current !== null) {
            if ($value == $current->value) {
                return $current;
            }
            $current = $current->next;
        }
        return false;
    }

    /**
     * Get the count of the LinkedList.
     * @return int
     */
    public function count()
    {
        return $this->count;
    }

    /**
     * Reverse the LinkedList
     * @return void
     */
    public function reverse()
    {
        $current = $this->head;
        $previous = null;
        $next = null;
        $tail = $this->head;

        while ($current !== null) {
            $next = $current->next;
            $current->next = $previous;
            $previous = $current;
            $current = $next;
        }
        $this->head = $previous;
        $this->tail = $tail;
    }

    /**
     * Print the LinkedList.
     * @return void
     */
    public function print()
    {
        $current = $this->head;

        while ($current !== null) {
            echo $current->value . ' ';
            $current = $current->next;
        }

        echo PHP_EOL;
    }
}
