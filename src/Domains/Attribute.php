<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 14:26
 */

namespace GuiaDoSoftwareSdk\Domains;


use GuiaDoSoftwareSdk\Contracts\Domain;
use GuiaDoSoftwareSdk\Traits\SafeGet;

class Attribute extends Domain
{
	use SafeGet;

	protected $id;
	protected $description;
	protected $short_description;
	protected $attribute_type_id;
	protected $attribute_type;
	protected $created_at;
	protected $updated_at;
	protected $order;

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
	 * @return Attribute
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
	 * @return Attribute
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
	 * @return Attribute
	 */
	public function setShortDescription($short_description)
	{
		$this->short_description = $short_description;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getAttributeTypeId()
	{
		return $this->attribute_type_id;
	}

	/**
	 * @param mixed $attribute_type_id
	 * @return Attribute
	 */
	public function setAttributeTypeId($attribute_type_id)
	{
		$this->attribute_type_id = $attribute_type_id;

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


	/**
	 * @return mixed
	 */
	public function getOrder()
	{
		return $this->order;
	}

	/**
	 * @param mixed $order
	 * @return Attribute
	 */
	public function setOrder($order)
	{
		$this->order = $order;

		return $this;
	}

	public function getAttributeType()
	{
		return $this->attribute_type;
	}


	public function populate(\stdClass $source)
	{
		$this->id                = $this->getSafe('id', $source);
		$this->description       = $this->getSafe('description', $source);
		$this->short_description = $this->getSafe('short_description', $source);
		$this->attribute_type_id = $this->getSafe('attribute_type_id', $source);
		$this->order             = $this->getSafe('order', $source);
		$this->created_at        = $this->getSafeDateTime('created_at', $source);
		$this->updated_at        = $this->getSafeDateTime('updated_at', $source);
		$this->attribute_type    = new AttributeType($this->getSafe('attribute_type', $source));
	}
}