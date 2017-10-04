<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 11:32
 */

namespace GuiaDoSoftwareSdk\Http\Resources;


use GuiaDoSoftwareSdk\Http\Requester;
use GuiaDoSoftwareSdk\Domains\Item as ItemDomain;

class Item extends Requester
{

	public function get($id = null)
	{
		if ($id) {
			$response = $this->request('GET', '/item/' . $id, []);
		}
		else {
			$response = $this->request('GET', '/item', []);
		}

		if (!is_array($response)) {
			return new ItemDomain($response);
		}

		$items = [];
		foreach ($response as $res) {
			$items[] = new ItemDomain($res);
		}

		return $items;
	}

	public function bootgrid($start, $length, $search, array $order)
	{
		return $this->request('GET', '/item/bootgrid', compact('start', 'length', 'search', 'order'));
	}

	public function store(ItemDomain $item)
	{
		return $this->request('POST', '/item', (array)$item);
	}

	public function update(ItemDomain $item)
	{
		return $this->request('PUT', '/item/' . $item->getId(), (array)$item);
	}

	public function plans($id)
	{
		return $this->request('GET', '/item/' . $id . '/plans', []);
	}

}