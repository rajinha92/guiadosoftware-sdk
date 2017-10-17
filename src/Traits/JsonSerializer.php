<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 17/10/17
 * Time: 10:42
 */

namespace GuiaDoSoftwareSdk\Traits;


trait JsonSerializer
{
	public function jsonSerialize()
	{
		return get_object_vars($this);
	}
}