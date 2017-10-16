<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 15:23
 */

namespace GuiaDoSoftwareSdk\Domains;


use GuiaDoSoftwareSdk\Contracts\Domain;
use GuiaDoSoftwareSdk\Traits\SafeGet;

class ItemGroup extends Domain
{
	use SafeGet;

	protected $id;
	protected $description;
	protected $slug;
	protected $is_published;
	protected $created_at;
	protected $updated_at;
	public $item_categories;

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
	 * @return ItemGroup
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
	 * @return ItemGroup
	 */
	public function setDescription($description)
	{
		$this->description = $description;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getSlug()
	{
		return $this->slug;
	}

	/**
	 * @param mixed $slug
	 * @return ItemGroup
	 */
	public function setSlug($slug)
	{
		$this->slug = $slug;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getisPublished()
	{
		return $this->is_published;
	}

	/**
	 * @param mixed $is_published
	 * @return ItemGroup
	 */
	public function setIsPublished($is_published)
	{
		$this->is_published = $is_published;

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
		$this->id           = $this->getSafe('id', $source);
		$this->description  = $this->getSafe('description', $source);
		$this->slug         = $this->getSafe('slug', $source);
		$this->is_published = $this->getSafe('is_published', $source);
		$this->created_at   = $this->getSafeDateTime('created_at', $source);
		$this->updated_at   = $this->getSafeDateTime('updated_at', $source);
		$this->item_categories = $this->getSafe('item_categories', $source);
	}
}
