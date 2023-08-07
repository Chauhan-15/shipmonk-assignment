<?php

namespace Akanksha\ShipMonk\Interfaces;

interface LinkedListInterface
{
    /**
     * Add a new value to the LinkedList.
     * @param $value
     * @return void
     **/
    public function add($value);

    /**
     * Remove a value from the LinkedList.
     * @param $value
     * @return mixed
     */
    public function remove($value);

    /**
     * Check if the LinkedList contains a value.
     * @param $value
     * @return mixed
     */
    public function contains($value);

    /**
     * Return the count of the LinkedList.
     * @return mixed
     */
    public function count();

    /**
     * Check if the LinkedList is empty.
     * @return mixed
     */
    public function isEmpty();

    /**
     * Clear the LinkedList.
     * @return mixed
     */
    public function clear();

    /**
     * Return the LinkedList as an array.
     * @return mixed
     */
    public function toArray();

    /**
     * Return the LinkedList as a string.
     * @return mixed
     */
    public function toString();

    /**
     * Return the LinkedList as a string.
     * @return mixed
     */
    public function reverse();
}
