<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 04/10/17
 * Time: 13:32
 */

namespace GuiaDoSoftwareSdk\Tests;


use GuiaDoSoftwareSdk\Domains\Attribute;

class AttributeResourceTest extends BaseApi
{
	public function testStore()
	{
		$attributeType = $this->api->attributeType()
		                           ->get()[0];

		$object = new Attribute();
		$object->setDescription('attribute test')
		       ->setAttributeTypeId($attributeType->getId())
		       ->setOrder(1)
		       ->setShortDescription('attribute short description');

		$attribute = $this->api->attribute()
		                       ->store($object);

		$this->assertInstanceOf(Attribute::class, $attribute);
		$this->assertGreaterThan(0, $attribute->getId());
		$this->assertEquals($object->getDescription(), $attribute->getDescription());
		$this->assertEquals($object->getShortDescription(), $attribute->getShortDescription());
		$this->assertEquals($object->getOrder(), $attribute->getOrder());
	}

	public function testGet()
	{
		$attributes = $this->api->attribute()
		                        ->get();

		$this->assertArrayHasKey(0, $attributes);
		$this->assertInstanceOf(Attribute::class, $attributes[0]);
	}

	public function testUpdate()
	{
		$attributes = $this->api->attribute()
		                        ->get();

		$attribute = $attributes[0];

		$attribute->setDescription('updated description')
		          ->setShortDescription('updated short description')
		          ->setOrder(2);

		$updatedAttribute = $this->api->attribute()
		                              ->update($attribute);

		$this->assertInstanceOf(Attribute::class, $updatedAttribute);

		$this->assertEquals($attribute->getDescription(), $updatedAttribute->getDescription());
		$this->assertEquals($attribute->getShortDescription(), $updatedAttribute->getShortDescription());
		$this->assertEquals($attribute->getOrder(), $updatedAttribute->getOrder());
	}

	public function testBootgrid()
	{
		$results = $this->api->attribute()
		                     ->bootgrid(0, 10, '', []);

		$this->assertInstanceOf(\stdClass::class, $results);
		$this->assertObjectHasAttribute('current', $results);
		$this->assertObjectHasAttribute('rowCount', $results);
		$this->assertObjectHasAttribute('total', $results);
		$this->assertObjectHasAttribute('rows', $results);
		$this->assertObjectHasAttribute('recordsFiltered', $results);

		$this->assertGreaterThan(0, count($results));
	}
}