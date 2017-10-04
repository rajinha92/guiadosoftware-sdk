<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 03/10/17
 * Time: 15:24
 */

namespace GuiaDoSoftwareSdk\Domains;


use GuiaDoSoftwareSdk\Contracts\Domain;
use GuiaDoSoftwareSdk\Traits\SafeGet;

class ItemPlan extends Domain
{
	use SafeGet;

	protected $id;
	protected $item_id;
	protected $item;
	protected $description;
	protected $value;
	protected $period;
	protected $benefits_list;
	protected $created_at;
	protected $updated_at;
	protected $currency;

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
	 * @return ItemPlan
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $this;
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
	 * @return ItemPlan
	 */
	public function setItemId($item_id)
	{
		$this->item_id = $item_id;

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
	 * @return ItemPlan
	 */
	public function setDescription($description)
	{
		$this->description = $description;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getValue()
	{
		return $this->value;
	}

	/**
	 * @param mixed $value
	 * @return ItemPlan
	 */
	public function setValue($value)
	{
		$this->value = $value;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPeriod()
	{
		return $this->period;
	}

	/**
	 * @param mixed $period
	 * @return ItemPlan
	 */
	public function setPeriod($period)
	{
		$this->period = $period;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getBenefitsList()
	{
		return $this->benefits_list;
	}

	/**
	 * @param mixed $benefits_list
	 * @return ItemPlan
	 */
	public function setBenefitsList($benefits_list)
	{
		$this->benefits_list = $benefits_list;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCurrency()
	{
		return $this->currency;
	}

	/**
	 * @param mixed $currency
	 * @return ItemPlan
	 */
	public function setCurrency($currency)
	{
		$this->currency = $currency;

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
		$this->id            = $this->getSafe('id', $source);
		$this->item_id       = $this->getSafe('item_id', $source);
		$this->item          = new Item($this->getSafe('item', $source));
		$this->description   = $this->getSafe('description', $source);
		$this->value         = $this->getSafe('value', $source);
		$this->period        = $this->getSafe('period', $source);
		$this->benefits_list = $this->getSafe('benefits_list', $source);
		$this->created_at    = $this->getSafeDateTime('created_at', $source);
		$this->updated_at    = $this->getSafeDateTime('updated_at', $source);
		$this->currency      = $this->getSafe('currency', $source, 'R$');
	}
}