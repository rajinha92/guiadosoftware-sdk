<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 14:36
 */

namespace GuiaDoSoftwareSdk\Domains;


use GuiaDoSoftwareSdk\Contracts\Domain;
use GuiaDoSoftwareSdk\Traits\SafeGet;
use GuiaDoSoftwareSdk\Traits\Url;

class Company extends Domain
{
	use Url, SafeGet;

	protected $id;
	protected $name;
	protected $site;
	protected $email;
	protected $phone_number;
	protected $location;
	protected $created_at;
	protected $updated_at;
	protected $nationality;
	protected $brazilian_office;
	protected $logo_path;
	public    $company_emails;
	public    $company_phones;

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
	 * @return Company
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $this;
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
	 * @return Company
	 */
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getSite()
	{
		return $this->site;
	}

	/**
	 * @param mixed $site
	 * @return Company
	 */
	public function setSite($site)
	{
		$this->site = $site;

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
	 * @return Company
	 */
	public function setEmail($email)
	{
		$this->email = $email;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPhoneNumber()
	{
		return $this->phone_number;
	}

	/**
	 * @param mixed $phone_number
	 * @return Company
	 */
	public function setPhoneNumber($phone_number)
	{
		$this->phone_number = $phone_number;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getLocation()
	{
		return $this->location;
	}

	/**
	 * @param mixed $location
	 * @return Company
	 */
	public function setLocation($location)
	{
		$this->location = $location;

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
	public function getNationality()
	{
		return $this->nationality;
	}

	/**
	 * @param mixed $nationality
	 * @return Company
	 */
	public function setNationality($nationality)
	{
		$this->nationality = $nationality;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getBrazilianOffice()
	{
		return $this->brazilian_office;
	}

	/**
	 * @param mixed $brazilian_office
	 * @return Company
	 */
	public function setBrazilianOffice($brazilian_office)
	{
		$this->brazilian_office = $brazilian_office;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getLogoPath($width = null, $height = null)
	{
		if ($width && $height) {
			return $this->getScaledImage($this->logo_path, $width, $height);
		}

		return $this->getImage($this->logo_path);
	}

	/**
	 * @param mixed $logo_path
	 * @return Company
	 */
	public function setLogoPath($logo_path)
	{
		$this->logo_path = $logo_path;

		return $this;
	}

	public function getCleanLogoPath()
	{
		return $this->logo_path;
	}


	public function populate(\stdClass $source)
	{
		$this->id               = $this->getSafe('id', $source);
		$this->name             = $this->getSafe('name', $source);
		$this->site             = $this->getSafe('site', $source);
		$this->email            = $this->getSafe('email', $source);
		$this->phone_number     = $this->getSafe('phone_number', $source);
		$this->location         = $this->getSafe('location', $source);
		$this->created_at       = $this->getSafeDateTime('created_at', $source);
		$this->updated_at       = $this->getSafeDateTime('updated_at', $source);
		$this->nationality      = $this->getSafe('nationality', $source);
		$this->brazilian_office = $this->getSafe('brazilian_office', $source);
		$this->logo_path        = $this->getSafe('logo_path', $source);
		$this->company_emails   = $this->getSafe('company_emails', $source);
		$this->company_phones   = $this->getSafe('company_phones', $source);
	}
}