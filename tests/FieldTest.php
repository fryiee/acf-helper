<?php

use Fryiee\ACF\Field;

/**
 * Class FieldTest
 */
class FieldTest extends PHPUnit_Framework_TestCase
{
    public function testFieldGeneration()
    {
        $field = new Field('test', 'Test Field', [], '12345');

        $generatedArray = $field->generate();

        $this->assertEquals('field_test_field12345', $generatedArray['key']);
        $this->assertEquals('test_field', $generatedArray['name']);
        $this->assertEquals('Test Field', $generatedArray['label']);
    }
}
