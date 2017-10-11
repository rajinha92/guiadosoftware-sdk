<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 15:12
 */

namespace GuiaDoSoftwareSdk\Domains;


use GuiaDoSoftwareSdk\Contracts\Domain;
use GuiaDoSoftwareSdk\Traits\SafeGet;
use GuiaDoSoftwareSdk\Traits\Url;

class Item extends Domain
{
	use Url, SafeGet;

	protected $url;
	protected $updated_at;
	protected $sub_category_id;
	protected $sub_category;
	protected $slug;
	protected $short_description;
	protected $relevance;
	protected $name;
	protected $item_group_id;
	protected $item_group;
	protected $image_url;
	protected $id;
	protected $free_trial;
	protected $description;
	protected $current_users;
	protected $current_reviewers;
	protected $current_grade;
	protected $current_followers;
	protected $current_favorites;
	protected $created_at;
	protected $company_id;
	protected $company;
	protected $category_id;
	protected $category;
	protected $medias;

	public function __construct(\stdClass $stdClass = null)
	{
		if ($stdClass) {
			$this->populate($stdClass);
		}
	}


	/**
	 * @return mixed
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * @param mixed $url
	 * @return Item
	 */
	public function setUrl($url)
	{
		$this->url = $url;

		return $this;
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
	public function getSubCategoryId()
	{
		return $this->sub_category_id;
	}

	/**
	 * @param mixed $sub_category_id
	 * @return Item
	 */
	public function setSubCategoryId($sub_category_id)
	{
		$this->sub_category_id = $sub_category_id;

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
	 * @return Item
	 */
	public function setSlug($slug)
	{
		$this->slug = $slug;

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
	 * @return Item
	 */
	public function setShortDescription($short_description)
	{
		$this->short_description = $short_description;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getRelevance()
	{
		return $this->relevance;
	}

	/**
	 * @param mixed $relevance
	 * @return Item
	 */
	public function setRelevance($relevance)
	{
		$this->relevance = $relevance;

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
	 * @return Item
	 */
	public function setName($name)
	{
		$this->name = $name;

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
	 * @return Item
	 */
	public function setItemGroupId($item_group_id)
	{
		$this->item_group_id = $item_group_id;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getImageUrl($width = null, $height = null)
	{
		if ($width && $height) {
			return $this->getScaledImage($this->image_url, $width, $height);
		}

		return $this->getImage($this->image_url);
	}

	/**
	 * @param mixed $image_url
	 * @return Item
	 */
	public function setImageUrl($image_url)
	{
		$this->image_url = $image_url;

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
	 * @return Item
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getFreeTrial()
	{
		return $this->free_trial;
	}

	/**
	 * @param mixed $free_trial
	 * @return Item
	 */
	public function setFreeTrial($free_trial)
	{
		$this->free_trial = $free_trial;

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
	 * @return Item
	 */
	public function setDescription($description)
	{
		$this->description = $description;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCurrentUsers()
	{
		return $this->current_users;
	}

	/**
	 * @return mixed
	 */
	public function getCurrentReviewers()
	{
		return $this->current_reviewers;
	}

	/**
	 * @return mixed
	 */
	public function getCurrentGrade()
	{
		return $this->current_grade;
	}

	/**
	 * @return mixed
	 */
	public function getCurrentFollowers()
	{
		return $this->current_followers;
	}


	/**
	 * @return mixed
	 */
	public function getCurrentFavorites()
	{
		return $this->current_favorites;
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
	public function getCompanyId()
	{
		return $this->company_id;
	}

	/**
	 * @param mixed $company_id
	 * @return Item
	 */
	public function setCompanyId($company_id)
	{
		$this->company_id = $company_id;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCategoryId()
	{
		return $this->category_id;
	}

	/**
	 * @param mixed $category_id
	 * @return Item
	 */
	public function setCategoryId($category_id)
	{
		$this->category_id = $category_id;

		return $this;
	}

	public function getMedias()
	{
		return $this->medias;
	}


	public function populate(\stdClass $source)
	{
		$this->url               = $this->getSafe('url', $source);
		$this->updated_at        = $this->getSafeDateTime('updated_at', $source);
		$this->sub_category_id   = $this->getSafe('sub_category_id', $source);
		$this->sub_category      = new SubCategory($this->getSafe('sub_category', $source));
		$this->slug              = $this->getSafe('slug', $source);
		$this->short_description = $this->getSafe('short_description', $source);
		$this->relevance         = $this->getSafe('relevance', $source);
		$this->name              = $this->getSafe('name', $source);
		$this->item_group_id     = $this->getSafe('item_group_id', $source);
		$this->item_group        = new ItemGroup($this->getSafe('item_group', $source));
		$this->image_url         = $this->getSafe('image_url', $source);
		$this->id                = $this->getSafe('id', $source);
		$this->free_trial        = $this->getSafe('free_trial', $source);
		$this->description       = $this->getSafe('description', $source);
		$this->current_users     = $this->getSafe('current_users', $source);
		$this->current_reviewers = $this->getSafe('current_reviewers', $source);
		$this->current_grade     = $this->getSafe('current_grade', $source);
		$this->current_followers = $this->getSafe('current_followers', $source);
		$this->current_favorites = $this->getSafe('current_favorites', $source);
		$this->created_at        = $this->getSafeDateTime('created_at', $source);
		$this->company_id        = $this->getSafe('company_id', $source);
		$this->company           = new Company($this->getSafe('company', $source));
		$this->category_id       = $this->getSafe('category_id', $source);
		$this->category          = new ItemCategory($this->getSafe('category', $source));
		$this->medias            = $this->getSafe('medias', $source);
	}
}