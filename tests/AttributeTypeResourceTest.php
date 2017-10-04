<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 17:33
 */

namespace GuiaDoSoftwareSdk\Tests;


use GuiaDoSoftwareSdk\Domains\AttributeType;

class AttributeTypeResourceTest extends BaseApi
{

	public function testStore()
	{
		$object = new AttributeType();
		$object->setDescription('Test type')
		       ->setShortDescription('Test short description');

		$attributeType = $this->api->attributeType()
		                           ->store($object);

		$this->assertInstanceOf(AttributeType::class, $attributeType);
		$this->assertEquals($object->getDescription(), $attributeType->getDescription());
		$this->assertEquals($object->getShortDescription(), $attributeType->getShortDescription());
		$this->assertAttributeGreaterThan(0, 'id', $attributeType);
	}

	public function testGet()
	{
		$attributeTypes = $this->api->attributeType()
		                            ->get();

		$this->assertArrayHasKey(0, $attributeTypes);
		$this->assertInstanceOf(AttributeType::class, $attributeTypes[0]);
	}

}