<?php

$installer = $this;
$installer->startSetup();

/*
 *
 * Add the custom attributes to the category object
 *
 */
$entityTypeId     = $installer->getEntityTypeId('catalog_category');
$attributeSetId   = $installer->getDefaultAttributeSetId($entityTypeId);
$attributeGroupId = $installer->getDefaultAttributeGroupId($entityTypeId, $attributeSetId);

$installer->addAttribute('catalog_category', Mage::helper('categoryplaceholderimages')->categoryPlaceholderImageAttributeCode, array(
	'backend' => 'catalog/category_attribute_backend_image',
	'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
	'type' => 'varchar',
	'input' => 'image',
	'visible' => 1,
	'visible_on_front'  => 1,
	'required' => 0,
	'group' => 'General',
	'label' => 'Placeholder Image for Subcategories',
));

$installer->addAttributeToGroup(
	$entityTypeId,
	$attributeSetId,
	$attributeGroupId,
	Mage::helper('categoryplaceholderimages')->categoryPlaceholderImageAttributeCode,
	999
);

$installer->endSetup();