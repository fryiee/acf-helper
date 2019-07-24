<?php namespace Fryiee\ACF;

use Fryiee\ACF\Contract\FieldInterface;

/**
 * Class Field
 * @package Fryiee\ACF
 */
class Field implements FieldInterface
{
    use UsesKeys;

    /**
     * @var string
     */
    private $label = '';

    /**
     * @var string
     */
    private $name = '';

    /**
     * @var array
     */
    private $args = [];

    /**
     * @var string
     */
    private $type = '';

    /**
     * Field constructor.
     * @param $type
     * @param $label
     * @param $args
     * @param $keySuffix
     */
    public function __construct($type, $label, $args, $keySuffix)
    {
        if (isset($args['name'])) {
            $name = $args['name'];
            unset($args['name']);
        } else {
            $name = $this->slugifyWord($label);
        }
        $this->setType($type);
        $this->setKey('field_' . $name . $keySuffix);
        $this->setLabel($label);
        $this->setName($name);
        $this->setArgs($args);
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
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

    /**
     * @param $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * This function will be extended by the children fields.
     * We use the abstract generator to pull in default fields that should be create.
     */
    public function generate()
    {
        $result = [
            'key' => $this->getKey(),
            'name' => $this->getName(),
            'label' => $this->getLabel(),
            'type' => $this->getType(),
        ];

        $args = $this->getArgs();

        if (count($args) > 0) {
            $result = array_merge($result, $args);
        }

        return $result;
    }
}
