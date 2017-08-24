<?php namespace Fryiee\ACF\Contract;

/**
 * Interface FieldInterface
 * @package Fryiee\ACF
 */
interface FieldInterface
{
    /**
     * @return mixed
     */
    public function getKey();

    /**
     * @param $key
     */
    public function setKey($key);

    /**
     * @return mixed
     */
    public function getName();

    /**
     * @param $name
     */
    public function setName($name);

    /**
     * @return mixed
     */
    public function getLabel();

    /**
     * @param $label
     */
    public function setLabel($label);

    /**
     * @return mixed
     */
    public function getType();

    /**
     * @param $type
     */
    public function setType($type);

    /**
     * @return mixed
     */
    public function generate();
}
