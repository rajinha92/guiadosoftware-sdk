<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 11:38
 */

namespace GuiaDoSoftwareSdk\Http\Resources;


use GuiaDoSoftwareSdk\Http\Requester;
use GuiaDoSoftwareSdk\Domains\ItemPlan as ItemPlanDomain;

class ItemPlan extends Requester
{
	public function get($id)
	{
		$response = $this->request('GET', '/item-plan/' . $id . '/get', []);

		return new ItemPlanDomain($response);
	}

	public function store(ItemPlanDomain $itemPlan)
	{
		return $this->request('POST', '/item-plan', (array)$itemPlan);
	}

	public function update(ItemPlanDomain $itemPlan)
	{
		return $this->request('PUT', '/item-plan/' . $itemPlan->getId(), (array)$itemPlan);
	}

	public function delete($id)
	{
		return $this->request('DELETE', '/item-plan/' . $id, []);
	}
}