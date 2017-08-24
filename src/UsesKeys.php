<?php namespace Fryiee\ACF;

/**
 * Class UsesKeys
 * @package Fryiee\ACF
 */
trait UsesKeys
{
    /**
     * @var
     */
    private $key;

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @param $word
     * @return mixed
     */
    private function slugifyWord($word)
    {
        $slug = trim($word);
        $slug = preg_replace('/[^0-9a-zA-Z_\s]/', '', $slug);
        return str_replace(' ', '_', strtolower($slug));
    }
}
