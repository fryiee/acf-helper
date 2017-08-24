<?php namespace Fryiee\ACF;

/**
 * Class Helper
 * @package Fryiee\ACF
 */
class Helper
{
    /**
     * @param $title
     * @param string $keySuffix
     * @param array
     * @return FieldGroup
     */
    public static function createFieldGroup($title, $keySuffix = '', $args = [])
    {
        return new FieldGroup($title, $keySuffix, $args);
    }

    /**
     * @param $type
     * @param $label
     * @param $args
     * @param string $keySuffix
     * @return Field|bool
     */
    public static function createField($type, $label, $args, $keySuffix = '')
    {
        $field = new Field($type, $label, $args, $keySuffix);

        return (!isset($field) ?: $field);
    }

    /**
     * @param FieldGroup $fieldGroup
     * @return null|void
     */
    public static function enqueue(FieldGroup $fieldGroup)
    {
        if (function_exists('register_field_group')) {
            register_field_group($fieldGroup->generate());
        } else {
            return null;
        }
    }
}
