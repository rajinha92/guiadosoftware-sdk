<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 14:13
 */

namespace GuiaDoSoftwareSdk\Domains;


use GuiaDoSoftwareSdk\Contracts\Domain;
use GuiaDoSoftwareSdk\Traits\SafeGet;

class User extends Domain
{
	use SafeGet;

	protected $id;
	protected $name;
	protected $email;
	protected $facebook_id;
	protected $linkedin_id;
	protected $picture_url;
	protected $job_title;
	protected $headline;
	protected $company_name;
	protected $industry;
	protected $role_id;
	protected $created_at;
	protected $updated_at;
	protected $deleted_at;

	public function __construct(\stdClass $stdClass = null)
	{
		if ($stdClass) {
			$this->populate($stdClass);
		}
	}


	/**
	 * @return string
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param string $id
	 * @return User
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param string $name
	 * @return User
	 */
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @param string $email
	 * @return User
	 */
	public function setEmail($email)
	{
		$this->email = $email;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getFacebookId()
	{
		return $this->facebook_id;
	}

	/**
	 * @param string $facebook_id
	 * @return User
	 */
	public function setFacebookId($facebook_id)
	{
		$this->facebook_id = $facebook_id;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getLinkedinId()
	{
		return $this->linkedin_id;
	}

	/**
	 * @param string $linkedin_id
	 * @return User
	 */
	public function setLinkedinId($linkedin_id)
	{
		$this->linkedin_id = $linkedin_id;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getPictureUrl()
	{
		return $this->picture_url;
	}

	/**
	 * @param string $picture_url
	 * @return User
	 */
	public function setPictureUrl($picture_url)
	{
		$this->picture_url = $picture_url;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getJobTitle()
	{
		return $this->job_title;
	}

	/**
	 * @param string $job_title
	 * @return User
	 */
	public function setJobTitle($job_title)
	{
		$this->job_title = $job_title;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getHeadline()
	{
		return $this->headline;
	}

	/**
	 * @param string $headline
	 * @return User
	 */
	public function setHeadline($headline)
	{
		$this->headline = $headline;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getCompanyName()
	{
		return $this->company_name;
	}

	/**
	 * @param string $company_name
	 * @return User
	 */
	public function setCompanyName($company_name)
	{
		$this->company_name = $company_name;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getIndustry()
	{
		return $this->industry;
	}

	/**
	 * @param string $industry
	 * @return User
	 */
	public function setIndustry($industry)
	{
		$this->industry = $industry;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getRoleId()
	{
		return $this->role_id;
	}

	/**
	 * @param int $role_id
	 * @return User
	 */
	public function setRoleId($role_id)
	{
		$this->role_id = $role_id;

		return $this;
	}

	/**
	 * @return \DateTime
	 */
	public function getCreatedAt()
	{
		return $this->created_at;
	}


	/**
	 * @return \DateTime
	 */
	public function getUpdatedAt()
	{
		return $this->updated_at;
	}


	/**
	 * @return \DateTime
	 */
	public function getDeletedAt()
	{
		return $this->deleted_at;
	}


	public function populate(\stdClass $source)
	{
		$this->id           = $this->getSafe('id', $source);
		$this->name         = $this->getSafe('name', $source);
		$this->email        = $this->getSafe('email', $source);
		$this->facebook_id  = $this->getSafe('facebook_id', $source);
		$this->linkedin_id  = $this->getSafe('linkedin_id', $source);
		$this->picture_url  = $this->getSafe('picture_url', $source);
		$this->job_title    = $this->getSafe('job_title', $source);
		$this->headline     = $this->getSafe('headline', $source);
		$this->company_name = $this->getSafe('company_name', $source);
		$this->industry     = $this->getSafe('industry', $source);
		$this->role_id      = $this->getSafe('role_id', $source);
		$this->created_at   = $this->getSafeDateTime('created_at', $source);
		$this->updated_at   = $this->getSafeDateTime('updated_at', $source);
		$this->deleted_at   = $this->getSafeDateTime('deleted_at', $source);
	}
}