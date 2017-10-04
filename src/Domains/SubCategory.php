<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 15:27
 */

namespace GuiaDoSoftwareSdk\Domains;


use GuiaDoSoftwareSdk\Contracts\Domain;
use GuiaDoSoftwareSdk\Traits\SafeGet;

class SubCategory extends Domain
{
	use SafeGet;

	protected $id;
	protected $description;
	protected $slug;
	protected $item_category_id;
	protected $item_category;
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
	 * @return SubCategory
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
	 * @return SubCategory
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
	 * @return SubCategory
	 */
	public function setSlug($slug)
	{
		$this->slug = $slug;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getItemCategoryId()
	{
		return $this->item_category_id;
	}

	/**
	 * @param mixed $item_category_id
	 * @return SubCategory
	 */
	public function setItemCategoryId($item_category_id)
	{
		$this->item_category_id = $item_category_id;

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
	 * @return SubCategory
	 */
	public function setIsPublished($is_published)
	{
		$this->is_published = $is_published;

		return $this;
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
	 * @return SubCategory
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
	 * @return SubCategory
	 */
	public function setTitle($title)
	{
		$this->title = $title;

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
		$this->id               = $this->getSafe('id', $source);
		$this->description      = $this->getSafe('description', $source);
		$this->slug             = $this->getSafe('slug', $source);
		$this->item_category_id = $this->getSafe('item_category_id', $source);
		$this->item_category    = new ItemCategory($this->getSafe('item_category', $source));
		$this->is_published     = $this->getSafe('is_published', $source);
		$this->created_at       = $this->getSafeDateTime('created_at', $source);
		$this->updated_at       = $this->getSafeDateTime('updated_at', $source);
		$this->content          = $this->getSafe('content', $source);
		$this->title            = $this->getSafe('title', $source);
	}
}