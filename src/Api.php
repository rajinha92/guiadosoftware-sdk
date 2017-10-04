<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 20/06/17
 * Time: 17:42
 */

namespace GuiaDoSoftwareSdk;


use GuiaDoSoftwareSdk\Http\Resources\Attribute;
use GuiaDoSoftwareSdk\Http\Resources\AttributeType;
use GuiaDoSoftwareSdk\Http\Resources\Company;
use GuiaDoSoftwareSdk\Http\Resources\Currency;
use GuiaDoSoftwareSdk\Http\Resources\InformationRequest;
use GuiaDoSoftwareSdk\Http\Resources\Item;
use GuiaDoSoftwareSdk\Http\Resources\ItemCategory;
use GuiaDoSoftwareSdk\Http\Resources\ItemGroup;
use GuiaDoSoftwareSdk\Http\Resources\ItemPlan;
use GuiaDoSoftwareSdk\Http\Resources\Media;
use GuiaDoSoftwareSdk\Http\Resources\SubCategory;
use GuiaDoSoftwareSdk\Http\Resources\User;

class Api
{
    private $_url;
    private $_token;

    private $_attribute;
    private $_attributeType;
    private $_company;
    private $_currency;
    private $_informationRequest;
    private $_item;
    private $_itemCategory;
    private $_itemGroup;
    private $_itemPlan;
    private $_media;
    private $_subCategory;
    private $_user;

    public function __construct($url, $token)
    {
        $this->_url = $url;
        $this->_token = $token;
    }

    /**
     * @return Attribute
     */
    public function attribute() : Attribute
    {
        if(!$this->_attribute)
            $this->_attribute = new Attribute($this->_url, $this->_token);
        return $this->_attribute;
    }

    /**
     * @return AttributeType
     */
    public function attributeType() : AttributeType
    {
        if(!$this->_attributeType)
            $this->_attributeType = new AttributeType($this->_url, $this->_token);
        return $this->_attributeType;
    }

    /**
     * @return Company
     */
    public function company() : Company
    {
        if(!$this->_company)
            $this->_company = new Company($this->_url, $this->_token);
        return $this->_company;
    }

    /**
     * @return Currency
     */
    public function currency() : Currency
    {
        if(!$this->_currency)
            $this->_currency = new Currency($this->_url, $this->_token);
        return $this->_currency;
    }

    /**
     * @return InformationRequest
     */
    public function informationRequest() : InformationRequest
    {
        if(!$this->_informationRequest)
            $this->_informationRequest = new InformationRequest($this->_url, $this->_token);
        return $this->_informationRequest;
    }

    /**
     * @return Item
     */
    public function item() : Item
    {
        if(!$this->_item)
            $this->_item = new Item($this->_url, $this->_token);
        return $this->_item;
    }

    /**
     * @return ItemCategory
     */
    public function itemCategory() : ItemCategory
    {
        if(!$this->_itemCategory)
            $this->_itemCategory = new ItemCategory($this->_url, $this->_token);
        return $this->_itemCategory;
    }

    /**
     * @return ItemGroup
     */
    public function itemGroup() : ItemGroup
    {
        if(!$this->_itemGroup)
            $this->_itemGroup = new ItemGroup($this->_url, $this->_token);
        return $this->_itemGroup;
    }

    /**
     * @return ItemPlan
     */
    public function itemPlan() : ItemPlan
    {
        if(!$this->_itemPlan)
            $this->_itemPlan = new ItemPlan($this->_url, $this->_token);
        return $this->_itemPlan;
    }

    /**
     * @return Media
     */
    public function media() : Media
    {
        if(!$this->_media)
            $this->_media = new Media($this->_url, $this->_token);
        return $this->_media;
    }

    /**
     * @return SubCategory
     */
    public function subCategory() : SubCategory
    {
        if(!$this->_subCategory)
            $this->_subCategory = new SubCategory($this->_url, $this->_token);
        return $this->_subCategory;
    }

    /**
     * @return User
     */
    public function user() : User
    {
        if(!$this->_user)
            $this->_user = new User($this->_url, $this->_token);
        return $this->_user;
    }

}
