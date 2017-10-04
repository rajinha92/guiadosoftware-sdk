<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 15:06
 */

namespace GuiaDoSoftwareSdk\Domains;


use GuiaDoSoftwareSdk\Contracts\Domain;
use GuiaDoSoftwareSdk\Traits\SafeGet;

class InformationRequest extends Domain
{
	use SafeGet;

	protected $item_id;
	protected $item;
	protected $message;
	protected $type;
	protected $created_at;
	protected $updated_at;
	protected $name;
	protected $email;
	protected $phone;
	protected $company;
	protected $id;

	public function __construct(\stdClass $stdClass = null)
	{
		if ($stdClass) {
			$this->populate($stdClass);
		}
	}


	/**
	 * @return mixed
	 */
	public function getItemId()
	{
		return $this->item_id;
	}

	/**
	 * @param mixed $item_id
	 * @return InformationRequest
	 */
	public function setItemId($item_id)
	{
		$this->item_id = $item_id;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getMessage()
	{
		return $this->message;
	}

	/**
	 * @param mixed $message
	 * @return InformationRequest
	 */
	public function setMessage($message)
	{
		$this->message = $message;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * @param mixed $type
	 * @return InformationRequest
	 */
	public function setType($type)
	{
		$this->type = $type;

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
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param mixed $name
	 * @return InformationRequest
	 */
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @param mixed $email
	 * @return InformationRequest
	 */
	public function setEmail($email)
	{
		$this->email = $email;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * @param mixed $phone
	 * @return InformationRequest
	 */
	public function setPhone($phone)
	{
		$this->phone = $phone;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCompany()
	{
		return $this->company;
	}

	/**
	 * @param mixed $company
	 * @return InformationRequest
	 */
	public function setCompany($company)
	{
		$this->company = $company;

		return $this;
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
	 * @return InformationRequest
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}


	public function populate(\stdClass $source)
	{
		$this->item_id    = $this->getSafe('item_id', $source);
		$this->item       = new Item($this->getSafe('item', $source));
		$this->message    = $this->getSafe('message', $source);
		$this->type       = $this->getSafe('type', $source);
		$this->created_at = $this->getSafeDateTime('created_at', $source);
		$this->updated_at = $this->getSafeDateTime('updated_at', $source);
		$this->name       = $this->getSafe('name', $source);
		$this->email      = $this->getSafe('email', $source);
		$this->phone      = $this->getSafe('phone', $source);
		$this->company    = $this->getSafe('company', $source);
		$this->id         = $this->getSafe('id', $source);
	}
}