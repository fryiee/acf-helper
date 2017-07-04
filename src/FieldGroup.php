<?php namespace Fryiee\ACF;

/**
 * Class FieldGroup
 * @package Fryiee\ACF
 */
class FieldGroup
{
    use UsesKeys;

    /**
     * @var string
     */
    private $title = '';

    /**
     * @var array
     */
    private $fields = [];

    /**
     * @var array
     */
    private $location = [];

    /**
     * @var array
     */
    private $args = [];

    /**
     * FieldGroup constructor.
     * @param $title
     * @param $keySuffix
     * @param $args
     */
    public function __construct($title, $keySuffix = '', $args = [])
    {
        $this->setTitle($title);
        $this->setKey('group_' . $this->slugifyWord($title) . $keySuffix);
        $this->setArgs($args);
    }

    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function generate()
    {
        $result = [
            'key' => $this->getKey(),
            'title' => $this->getTitle(),
            'location' => $this->getLocation(),
        ];

        /* add any user set args */
        $args = $this->getArgs();

        if (count($args) > 0) {
            $result = array_merge($result, $args);
        }

        /* add fields */
        $fields = $this->getFields();
        if (count($fields) > 0) {
            foreach ($fields as $field) {
                $result['fields'][] = $field;
            }
        }

        return $result;
    }

    /**
     * @param $field
     */
    public function addField($field)
    {
        if (isset($field)) {
            $this->fields[] = $field->generate();
        }
    }

    public function addLocation($location)
    {
        $this->location[][] = $location;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setArgs($args)
    {
        $this->args = $args;
    }

    public function getArgs()
    {
        return $this->args;
    }
}