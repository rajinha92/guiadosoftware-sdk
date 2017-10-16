<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 11:56
 */

namespace GuiaDoSoftwareSdk\Http\Resources;


use GuiaDoSoftwareSdk\Http\Requester;
use GuiaDoSoftwareSdk\Domains\ItemCategory as ItemCategoryDomain;

class ItemCategory extends Requester
{
    public function bootgrid($start, $length, $search, array $order)
    {
        return $this->request('GET', '/item-category/bootgrid', compact('start', 'length', 'search', 'order'));
    }

    public function store(ItemCategoryDomain $itemCategory)
    {
        $response = $this->request('POST', '/item-category', $itemCategory->toArray());
        return new ItemCategoryDomain($response);
    }

    public function get($id = null)
    {
        if ($id)
            $response = $this->request('GET', '/item-category/' . $id, []);
        else
        $response = $this->request('GET', '/item-category', []);

        if(!is_array($response))
        	return new ItemCategoryDomain($response);

        $itemCategories = [];

        foreach($response as $res){
        	$itemCategories[] = new ItemCategoryDomain($res);
        }

        return $itemCategories;

    }

    public function update(ItemCategoryDomain $itemCategory)
    {
        return $this->request('PUT', '/item-category/' . $itemCategory->getId(), $itemCategory->toArray());
    }

    public function publish($id)
    {
        return $this->request('POST', '/item-category/' . $id . '/publish', []);
    }

    public function unpublish($id)
    {
        return $this->request('POST', '/item-category/' . $id . '/unpublish', []);
    }

}