<?php

use Fryiee\ACF\Helper;

class HelperTest extends PHPUnit_Framework_TestCase {

    public function testFieldGroupReturned()
    {
        $fieldGroup = Helper::createFieldGroup('test', '');

        $this->assertInstanceOf(\Fryiee\ACF\FieldGroup::class, $fieldGroup);
    }

    public function testFieldReturned()
    {
        $field = Helper::createField('text', 'Test Field', []);

        $this->assertInstanceOf(\Fryiee\ACF\Field::class, $field);
    }
}