<?php

use Fryiee\ACF\Helper;

/**
 * Class HelperTest
 */
class HelperTest extends PHPUnit_Framework_TestCase
{
    public function testFieldGroupReturned()
    {
        $fieldGroup = Helper::createFieldGroup('test', '');

        $this->assertInstanceOf(\Fryiee\ACF\FieldGroup::class, $fieldGroup);
    }

    public function testFieldGroupGeneratedWithArgs()
    {
        $fieldGroup = Helper::createFieldGroup('test', '', ['menu_order' => 0]);

        $generatedArray = $fieldGroup->generate();

        $this->assertEquals(0, $generatedArray['menu_order']);
    }

    public function testFieldReturned()
    {
        $field = Helper::createField('text', 'Test Field', []);

        $this->assertInstanceOf(\Fryiee\ACF\Field::class, $field);
    }
}
