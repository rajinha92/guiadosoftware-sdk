<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 15:10
 */

namespace GuiaDoSoftwareSdk\Contracts;


use GuiaDoSoftwareSdk\Traits\JsonSerializer;

abstract class Domain implements \JsonSerializable
{
	use JsonSerializer;

	public function populate(\stdClass $source)
	{
		throw new \Exception("Method not implemented yet");
	}

	public function toArray()
	{
		$assoc = [];

		foreach ($this as $key => $value) {
			if (!is_object($value)) {
				$assoc[$key] = $value;
				continue;
			}

			$valueAssoc = [];

			foreach ($value as $k => $v) {
				$valueAssoc[$k] = $v;
			}

			$assoc[$key] = $valueAssoc;
		}

		return $assoc;
	}
}