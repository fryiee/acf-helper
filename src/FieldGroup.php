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

        // Fallback protection for ACF 4.4.11 which doesn't automatically set these arguments
        if (!isset($args['menu_order'])) {
            $args['menu_order'] = 0;
        }

        if (!isset($args['options'])) {
            $args['options'] = [];
        }

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
            'location' => $this->getLocations(),
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

    /**
     * @param array $fields An array of Fields
     */
    public function addFields($fields)
    {
        if (is_array($fields)) {
            foreach ($fields as $field) {
                $this->addField($field);
            }
        }
    }

    /**
     * @todo add support for multiple locations with operators
     *
     * @param $param
     * @param $operator
     * @param $value
     */
    public function addLocation($param, $operator, $value)
    {
        array_push($this->location, [[
            'param' => $param,
            'operator' => $operator,
            'value' => $value
        ]]);
    }

    /**
     * @return array
     */
    public function getLocations()
    {
        return $this->location;
    }

    /**
     * @param $args
     */
    public function setArgs($args)
    {
        $this->args = $args;
    }

    /**
     * @return array
     */
    public function getArgs()
    {
        return $this->args;
    }
}
