<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 15:22
 */

namespace GuiaDoSoftwareSdk\Domains;


use GuiaDoSoftwareSdk\Contracts\Domain;
use GuiaDoSoftwareSdk\Traits\SafeGet;

class ItemCategory extends Domain
{
	use SafeGet;

	protected $id;
	protected $description;
	protected $slug;
	protected $item_group_id;
	protected $item_group;
	protected $is_published;
	protected $created_at;
	protected $updated_at;
	protected $content;
	protected $title;

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
	 * @return ItemCategory
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
	 * @return ItemCategory
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
	 * @return ItemCategory
	 */
	public function setSlug($slug)
	{
		$this->slug = $slug;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getItemGroupId()
	{
		return $this->item_group_id;
	}

	/**
	 * @param mixed $item_group_id
	 * @return ItemCategory
	 */
	public function setItemGroupId($item_group_id)
	{
		$this->item_group_id = $item_group_id;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getIsPublished()
	{
		return $this->is_published;
	}

	/**
	 * @param mixed $is_published
	 * @return ItemCategory
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


	/**
	 * @return mixed
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * @param mixed $content
	 * @return ItemCategory
	 */
	public function setContent($content)
	{
		$this->content = $content;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param mixed $title
	 * @return ItemCategory
	 */
	public function setTitle($title)
	{
		$this->title = $title;

		return $this;
	}


	public function populate(\stdClass $source)
	{
		$this->id            = $this->getSafe('id', $source);
		$this->description   = $this->getSafe('description', $source);
		$this->slug          = $this->getSafe('slug', $source);
		$this->item_group_id = $this->getSafe('item_group_id', $source);
		$this->item_group    = new ItemGroup($this->getSafe('item_group', $source));
		$this->is_published  = $this->getSafe('is_published', $source);
		$this->created_at    = $this->getSafeDateTime('created_at', $source);
		$this->updated_at    = $this->getSafeDateTime('updated_at', $source);
		$this->content       = $this->getSafe('content', $source);
		$this->title         = $this->getSafe('title', $source);
	}
}