<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 04/10/17
 * Time: 13:49
 */

namespace GuiaDoSoftwareSdk\Tests;


use GuiaDoSoftwareSdk\Domains\Company;

class CompanyResourceTest extends BaseApi
{
	public function testStore()
	{
		$object = new Company();
		$object->setEmail('rafael.conrado.farias@gmail.com')
		       ->setName('Rafael Conrado')
		       ->setBrazilianOffice(true)
		       ->setSite('http://rafaelconrado.com.br')
		       ->setLocation('Curitiba')
		       ->setPhoneNumber('(41) 99999-99999');

		$company = $this->api->company()
		                     ->store($object);

		$this->assertInstanceOf(Company::class, $company);
		$this->assertGreaterThan(0, $company->getId());
		$this->assertEquals($object->getEmail(), $company->getEmail());
		$this->assertEquals($object->getName(), $company->getName());
		$this->assertEquals($object->getBrazilianOffice(), $company->getBrazilianOffice());
		$this->assertEquals($object->getSite(), $company->getSite());
		$this->assertEquals($object->getLocation(), $company->getLocation());
		$this->assertEquals($object->getPhoneNumber(), $company->getPhoneNumber());

	}

	public function testUpdate()
	{
		$companies = $this->api->company()
		                       ->get();
		$company   = $this->api->company()
		                       ->get($companies[0]->getId());
		$company->setLocation('updated location')
		        ->setName('updated name')
		        ->setEmail('update@email.com');

		$updatedCompany = $this->api->company()
		                            ->update($company);

		$this->assertInstanceOf(Company::class, $updatedCompany);

		$this->assertEquals($company->getLocation(), $updatedCompany->getLocation());
		$this->assertEquals($company->getName(), $updatedCompany->getName());
		$this->assertEquals($company->getEmail(), $updatedCompany->getEmail());
	}

	public function testBootgrid()
	{
		$results = $this->api->company()
		                     ->bootgrid(0, 10, '', []);

		$this->assertInstanceOf(\stdClass::class, $results);
		$this->assertObjectHasAttribute('current', $results);
		$this->assertObjectHasAttribute('rowCount', $results);
		$this->assertObjectHasAttribute('total', $results);
		$this->assertObjectHasAttribute('rows', $results);
		$this->assertObjectHasAttribute('recordsFiltered', $results);

		$this->assertGreaterThan(0, count($results));
	}

	public function testGet()
	{
		$companies = $this->api->company()
		                       ->get();

		$this->assertArrayHasKey(0, $companies);
		$this->assertInstanceOf(Company::class, $companies[0]);

		$company = $this->api->company()
		                     ->get($companies[0]->getId());
		$this->assertInstanceOf(Company::class, $company);
	}
}