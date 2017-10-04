<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 11:48
 */

namespace GuiaDoSoftwareSdk\Http\Resources;


use GuiaDoSoftwareSdk\Http\Requester;
use GuiaDoSoftwareSdk\Domains\Attribute as AttributeDomain;

class Attribute extends Requester
{
	public function bootgrid($start, $length, $search, array $order)
	{
		return $this->request('GET', '/attribute/bootgrid', compact('start', 'length', 'search', 'order'));
	}

	public function store(AttributeDomain $attribute): AttributeDomain
	{
		$response = $this->request('POST', '/attribute', $attribute->toArray());

		return new AttributeDomain($response);
	}

	public function get($id = null)
	{
		try {
			if ($id) {
				$response = $this->request('GET', '/attribute/' . $id, []);
			}
			else {
				$response = $this->request('GET', '/attribute', []);
			}

			if (!is_array($response)) {
				return new AttributeDomain($response);
			}

			$attributes = [];
			foreach ($response as $res) {
				$attributes[] = new AttributeDomain($res);
			}


			return $attributes;

		}
		catch (\Exception $e) {
			throw new $e;
		}

	}

	public function update(AttributeDomain $attribute)
	{
		$response = $this->request('PUT', '/attribute/' . $attribute->getId(), $attribute->toArray());

		return new AttributeDomain($response);
	}
}