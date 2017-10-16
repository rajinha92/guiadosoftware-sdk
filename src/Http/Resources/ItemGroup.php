<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 11:53
 */

namespace GuiaDoSoftwareSdk\Http\Resources;


use GuiaDoSoftwareSdk\Http\Requester;
use GuiaDoSoftwareSdk\Domains\ItemGroup as ItemGroupDomain;

class ItemGroup extends Requester
{

	public function bootgrid($start, $length, $search, array $order)
	{
		return $this->request('GET', '/item-group/bootgrid', compact('start', 'length', 'search', 'order'));
	}

	public function store(ItemGroupDomain $itemGroup)
	{
		$response = $this->request('POST', '/item-group', $itemGroup->toArray());

		return new ItemGroupDomain($response);
	}

	public function get($id = null)
	{
		if ($id) {
			$response = $this->request('GET', '/item-group/' . $id, []);
		}
		else {
			$response = $this->request('GET', '/item-group', []);
		}

		if (!is_array($response)) {
			return new ItemGroupDomain($response);
		}

		$itemGroups = [];

		foreach ($response as $res) {
			$itemGroups[] = new ItemGroupDomain($res);
		}

		return $itemGroups;
	}

	public function update(ItemGroupDomain $itemGroup)
	{
		$response = $this->request('PUT', '/item-group/' . $itemGroup->getId(), $itemGroup->toArray());

		return new ItemGroupDomain($response);
	}

	public function publish($id)
	{
		return $this->request('POST', '/item-group/' . $id . '/publish', []);
	}

	public function unpublish($id)
	{
		return $this->request('POST', '/item-group/' . $id . '/unpublish', []);
	}
}