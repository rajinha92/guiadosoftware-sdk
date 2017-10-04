<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 17:35
 */

namespace GuiaDoSoftwareSdk\Tests;


use GuiaDoSoftwareSdk\Api;

class BaseApi extends \PHPUnit\Framework\TestCase
{
	protected $url   = 'http://guia.local:8001';
	protected $token = 'fboZLFLoUTrT6xhLOMwvoGI0IzrYUcEUzV6L0CS7oqBgiBPmu4a2a8U2QXy4';
	protected $api;

	public function __construct()
	{
		parent::__construct();
		$this->api = new Api($this->url, $this->token);
	}
}