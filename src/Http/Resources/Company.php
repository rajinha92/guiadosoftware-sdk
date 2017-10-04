<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 11:41
 */

namespace GuiaDoSoftwareSdk\Http\Resources;


use GuiaDoSoftwareSdk\Http\Requester;
use GuiaDoSoftwareSdk\Domains\Company as CompanyDomain;

class Company extends Requester
{
	public function get($id = null)
	{

		if ($id) {
			$response = $this->request('GET', '/company/' . $id, []);
		}
		else {
			$response = $this->request('GET', '/company', []);
		}

		if (!is_array($response)) {
			return new CompanyDomain($response);
		}

		$companies = [];

		foreach ($response as $res) {
			$companies[] = new CompanyDomain($res);
		}

		return $companies;
	}

	public function bootgrid($start, $length, $search, array $order)
	{
		return $this->request('GET', '/company/bootgrid', compact('start', 'length', 'search', 'order'));
	}

	public function store(CompanyDomain $company): CompanyDomain
	{
		$response = $this->request('POST', '/company', $company->toArray());

		return new CompanyDomain($response);
	}

	public function update(CompanyDomain $company) : CompanyDomain
	{
		$response = $this->request('PUT', '/company/' . $company->getId(), $company->toArray());

		return new CompanyDomain($response);
	}
}