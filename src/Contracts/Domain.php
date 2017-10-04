<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 15:10
 */

namespace GuiaDoSoftwareSdk\Contracts;


abstract class Domain
{
	public function populate(\stdClass $source)
	{
		throw new \Exception("Method not implemented yet");
	}

	public function toArray()
	{
		$assoc = [];

		foreach ($this as $key => $value) {
			$assoc[$key] = $value;
		}

		return $assoc;
	}
}