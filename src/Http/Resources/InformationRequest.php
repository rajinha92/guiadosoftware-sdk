<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 11:37
 */

namespace GuiaDoSoftwareSdk\Http\Resources;


use GuiaDoSoftwareSdk\Http\Requester;
use GuiaDoSoftwareSdk\Domains\InformationRequest as InformationRequestDomain;

class InformationRequest extends Requester
{

	public function bootgrid($company_id, $type, $start, $length, $search, array $order)
	{
		return $this->request('GET', '/information-request/bootgrid/' . $type . '/' . $company_id,
		                      compact('start', 'length', 'search', 'order'));

	}

	public function get($id)
	{
		$response = $this->request('GET', '/information-request/' . $id, []);

		return new InformationRequestDomain($response);
	}

	public function count($id)
	{
		return $this->request('GET', '/information-request/' . $id . '/count', []);
	}

}