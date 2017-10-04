<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 16:51
 */

namespace GuiaDoSoftwareSdk\Traits;


use Faker\Provider\DateTime;

trait SafeGet
{
	public function getSafe($key, \stdClass $object = null, $default = null)
	{
		if (empty($object)) {
			$object = $this;
		}

		if (isset($object->$key)) {
			return $object->$key;
		}

		return $default;
	}

	public function getSafeArrayObjects($key, $class, \stdClass $object = null, $default = null)
	{
		if (empty($object)) {
			$object = $this;
		}

		if (isset($object->$key)) {
			if (!is_array($object->$key)) {
				return new $class($object->$key);
			}
			$objects = [];
			foreach ($object->$key as $obj) {
				$objects[] = new $class($obj);
			}

			return $objects;
		}

		return $default;
	}

	public function getSafeDateTime($key, \stdClass $object = null, $format = null, $default = null)
	{
		$date = null;

		if (empty($object)) {
			$object = $this;
		}

		if (isset($object->$key)) {
			if (!empty($format)) {
				$date = \DateTime::createFromFormat($format, $object->$key);
			}
			else {
				$date = new \DateTime($object->$key);
			}
		}

		return !empty($date) ? $date : $default;
	}
}