# ACF Helper
A composer package for programmatically adding ACF fields to your Wordpress site.

## Why use this package?
Elliott Condon's Advanced Custom Fields is an amazing plugin for enhancing the content on a Wordpress site. However,
programmatically adding fields is a cumbersome process, requiring writing multiple nested arrays, or creating the 
field group first in the plugin itself then exporting the code (with the end result still being a huge web of arrays). 

This package aims to reduce the amount of field boilerplate diluting your theme's code by simplifying the process of 
registering field groups and fields programmatically.

## Requirements
- Composer
- Advanced Custom Fields Wordpress plugin
- Advanced Custom Fields Pro or the Field Type addon plugins if you plan to use premium field types.

## Installation
You can use Composer to add the package to your project by using `composer require fryiee/acf-repeater:0.1.*` or 
adding `fryiee/acf-repeater:0.1.*` directly to the composer.json.

Add the package to your functions.php or similar theme file (such as a TimberSite class file) by adding 
`use Fryiee\ACF\Helper as ACFHelper` to the top of the file.

## Basic Example
```
$fieldGroup = ACFHelper::createFieldGroup('Example Field Group', '_a_suffix_to_the_group_key');
$fieldGroup->addLocation('post_type', '==', 'post');
$field = ACFHelper::createField('text', 'Example Field', ['required' => 1], '_a_suffix_to_the_field_key');
$fieldGroup->addField($field);
ACFHelper::enqueue($fieldGroup);
```

## Classes & Methods
### Helper
The `\Fryiee\ACF\Helper` package is the main entry point of the Helper package. This is where you will generate all your 
field groups and fields, as well as enqueue them.

#### Helper::createFieldGroup($title, $keySuffix = '', $args = []);
This static method creates an instance of `\Fryiee\ACF\FieldGroup`. It takes the title of the Field Group as an 
argument, optionally a key suffix, and optionally additional arguments. By default, the helper class will set the field 
group's key to `group_slugified_title`, with the key suffix being added if it is not empty. 

The `$args` argument takes any of the existing arguments for fields. See here: 
 https://www.advancedcustomfields.com/resources/register-fields-via-php/

*REMINDER: Changing your field group's title or key suffix will mean that existing data is no longer connected unless 
 it is altered in the database.*
 
#### Helper::createField($type, $label, $args, $keySuffix = '')
This static method creates an instance of `\Fryiee\ACF\Field`. It takes the type of the field, the label, any 
additional arguments as an array, and optionally a key suffix. By default, the helper class will set the field's name 
to the slug of the label, and set the key to `field_slugified_label`, with the key suffix being added if it is not 
empty. This can be overrided by providing a `'name'` attribute in the $args array.

TBA List of field type slugs.

*REMINDER: Changing your field's label or key suffix will mean that existing data is no longer 
connected unless it is altered in the database.*

The `$args` argument takes any of the existing arguments for fields. See here: 
https://www.advancedcustomfields.com/resources/register-fields-via-php/
 
TBA List of arguments for each field type.

#### Helper::enqueue($fieldGroup)
This static method enqueues the field group using ACF's built in `register_field_group()` function for compatibility 
with both ACF and ACF PRO. It takes an instance of `\Fryiee\ACF\FieldGroup` as an argument.

### FieldGroup
#### $fieldGroup->addLocation($param, $operator, $value)
This method adds a location parameter to the field group.

TBA Add support for multiple locations

#### $fieldGroup->addField($field)
This method adds a field to the field group. It takes an instance of `\Fryiee\ACF\Field` as an argument.

#### $fieldGroup->generate()
TBA

### Field
#### $field->generate()
TBA