<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 11:46
 */

namespace GuiaDoSoftwareSdk\Http\Resources;


use GuiaDoSoftwareSdk\Http\Requester;
use GuiaDoSoftwareSdk\Domains\AttributeType as AttributeTypeDomain;
use GuiaDoSoftwareSdk\Domains\Attribute as AttributeDomain;

class AttributeType extends Requester
{

	public function get()
	{
		$response = $this->request('GET', '/attribute-type', []);

		if (is_array($response)) {
			$attributeTypes = [];
			foreach ($response as $res) {
				$attributeTypes[] = new AttributeTypeDomain($res);
			}

			return $attributeTypes;
		}

		return new AttributeTypeDomain($response);
	}

	public function attributes($id)
	{
		$attributes = [];
		$response   = $this->request('GET', '/attribute-type/' . $id . '/attributes', []);
		foreach ($response as $res) {
			$attributes[] = new AttributeDomain($res);
		}

		return $attributes;
	}

	public function store(AttributeTypeDomain $attributeType)
	{
		$response = $this->request('POST', '/attribute-type', $attributeType->toArray());
		return new AttributeTypeDomain($response);
	}

	public function delete($id)
	{
		return $this->request('DELETE', '/attribute-type/' . $id, []);
	}
}