<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 15:25
 */

namespace GuiaDoSoftwareSdk\Domains;


use GuiaDoSoftwareSdk\Contracts\Domain;
use GuiaDoSoftwareSdk\Traits\SafeGet;

class Media extends Domain
{
	use SafeGet;

	protected $id;
	protected $media_url;
	protected $media_name;
	protected $mediable_id;
	protected $created_at;
	protected $updated_at;

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
	 * @return Media
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getMediaUrl()
	{
		return $this->media_url;
	}

	/**
	 * @param mixed $media_url
	 * @return Media
	 */
	public function setMediaUrl($media_url)
	{
		$this->media_url = $media_url;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getMediaName()
	{
		return $this->media_name;
	}

	/**
	 * @param mixed $media_name
	 * @return Media
	 */
	public function setMediaName($media_name)
	{
		$this->media_name = $media_name;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getMediableId()
	{
		return $this->mediable_id;
	}

	/**
	 * @param mixed $mediable_id
	 * @return Media
	 */
	public function setMediableId($mediable_id)
	{
		$this->mediable_id = $mediable_id;

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


	public function populate(\stdClass $source)
	{
		$this->id          = $this->getSafe('id', $source);
		$this->media_url   = $this->getSafe('media_url', $source);
		$this->media_name  = $this->getSafe('media_name', $source);
		$this->mediable_id = $this->getSafe('mediable_id', $source);
		$this->created_at  = $this->getSafeDateTime('created_at', $source);
		$this->updated_at  = $this->getSafeDateTime('updated_at', $source);
	}
}