<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 11:59
 */

namespace GuiaDoSoftwareSdk\Http\Resources;


use GuiaDoSoftwareSdk\Http\Requester;
use GuiaDoSoftwareSdk\Domains\SubCategory as SubCategoryDomain;

class SubCategory extends Requester
{
    public function get($id)
    {
        $response = $this->request('GET', '/sub-category/' . $id, []);

        return new SubCategoryDomain($response);
    }

    public function bootgrid($start, $length, $search, array $order)
    {
        return $this->request('GET', '/sub-category/bootgrid', compact('start', 'length', 'search', 'order'));
    }

	/**
	 * @param $id
	 * @param array $data contains attribute_id
	 * @return array|mixed|object
	 */
    public function attributes($id, array $data)
    {
        return $this->request('POST', '/sub-category/' . $id . '/attributes', $data);
    }

    public function store(SubCategoryDomain $subCategory)
    {
    	$response = $this->request('POST', '/sub-category', $subCategory->toArray());
        return new SubCategoryDomain($response);
    }

    public function update(SubCategoryDomain $subCategory)
    {
        $response = $this->request('PUT', '/sub-category/' . $subCategory->getId(), $subCategory->toArray());
	    return new SubCategoryDomain($response);
    }

    public function publish($id)
    {
        return $this->request('POST', '/sub-category/' . $id . '/publish', []);
    }

    public function unpublish($id)
    {
        return $this->request('POST', '/sub-category/' . $id . '/unpublish', []);
    }
}