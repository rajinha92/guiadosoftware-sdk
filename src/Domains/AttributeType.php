<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 14:34
 */

namespace GuiaDoSoftwareSdk\Domains;


use GuiaDoSoftwareSdk\Contracts\Domain;
use GuiaDoSoftwareSdk\Traits\SafeGet;

class AttributeType extends Domain
{
	use SafeGet;

	protected $id;
	protected $description;
	protected $short_description;
	protected $created_at;
	protected $updated_at;
	protected $attributes;

	public function __construct(\stdClass $stdClass = null)
	{
		if ($stdClass) {
			$this->populate($stdClass);
		}
	}


	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 * @return AttributeType
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param mixed $description
	 * @return AttributeType
	 */
	public function setDescription($description)
	{
		$this->description = $description;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getShortDescription()
	{
		return $this->short_description;
	}

	/**
	 * @param mixed $short_description
	 * @return AttributeType
	 */
	public function setShortDescription($short_description)
	{
		$this->short_description = $short_description;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCreatedAt()
	{
		return $this->created_at;
	}


	/**
	 * @return mixed
	 */
	public function getUpdatedAt()
	{
		return $this->updated_at;
	}

	public function getAttributes()
	{
		return $this->attributes;
	}


	public function populate(\stdClass $source)
	{
		$this->id                = $this->getSafe('id', $source);
		$this->description       = $this->getSafe('description', $source);
		$this->short_description = $this->getSafe('short_description', $source);
		$this->created_at        = $this->getSafeDateTime('created_at', $source);
		$this->updated_at        = $this->getSafeDateTime('updated_at', $source);
		$this->attributes        = $this->getSafeArrayObjects('attributes', Attribute::class, $source);
	}
}