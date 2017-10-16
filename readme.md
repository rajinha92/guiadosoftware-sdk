## Guia do Software - SDK

Guia do Software SDK is a helpful package for integration with guiadosoftware.com.

### Documentation

#### Initialization
```php
$api = new Api('http://guiadosoftware.com', '<YOUR_TOKEN>');
```

##### 1- Attribute Types
##### get [GET]
```php
$api->attributeType()->get();
```
##### store(AttributeType) [POST]
```php
$attributeType = new AttributeType();
$attributeType->setDescription('Test')
              ->setShortDescription('Short Test');
$api->attributeType()->store($attributeType);
```
##### attributes(AttributeTypeId) [GET]
```php
$api->attributeType()->attributes($attributeType->getId());
```
##### delete(AttributeTypeId) [DELETE]
```php
$api->attributeType()->delete($attributeType->getId());
```

##### 2- Attributes
##### bootgrid(start, length, search, order) [GET]
```php
$api->attribute()->bootgrid(0, 10, '', ['id'=>'desc']);
```
##### get([AttributeId = null]) [GET]
```php
$api->attribute()->get(); //all
$api->attribute()->get($attribute->getId()) //specific attribute
```
##### store(Attribute) [POST]
```php
$attribute = new Attribute();
$attribute->setDescription('Test')
          ->setShortDescription('Short Test')
          ->setAttributeTypeId($attributeType->getId())
          ->setOrder(1);
$api->attribute()->store($attribute);
```
##### update(Attribute) [PUT]
```php
$attribute = $api->attribute()->get(1);
$attribute->setDescription('updated description');
$api->attribute()->update($attribute);
```

##### 3- Companies
##### bootgrid(start, length, search, order) [GET]
```php
$api->company()->bootgrid(0, 10, '', ['id'=>'desc']);
```
##### get([AttributeId = null]) [GET]
```php
$api->company()->get(); //all
$api->company()->get($company->getId()) //specific company
```
##### store(Attribute) [POST]
```php
$company = new Company();
$company->setName('Test')
          ->setEmail('compnay@sample.com')
          ->setSite('company.com')
          ->setPhoneNumber('(41)99999-9999');
$api->company()->store($company);
```
##### update(Attribute) [PUT]
```php
$company = $api->company()->get(1);
$company->setName('updated name');
$api->company()->update($company);
```

##### 4- Information Requests
##### 5- Items
##### 6- Item Category
##### 7- Item Group
##### 8- Item Plans
##### 9- Media
##### 10- Sub Category
##### 11- Users