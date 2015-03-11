<?php

class MobWeb_CategoryPlaceholderImages_Helper_Data extends Mage_Core_Helper_Abstract {
	public $categoryPlaceholderImageAttributeCode = 'image_placeholder_';
	public $numberOfCustomImageFields = 5;

	public function log($msg, $level = NULL)
	{
	    Mage::log($msg, $level, $this->_getModuleName() . '.log');
	}

	public function getImageUrl(Mage_Catalog_Model_Category $category)
	{
		// If an image exists for the current category, return it
		if($imageUrl = $category->getImageUrl()) {
			return $imageUrl;
		}

		// If no image exists for the current category, loop through all the parent categories
		$categoryPath = $category->getPath();
		$parentCategoryIds = explode('/', $categoryPath);

		// Loop through the parent categories in reverse order
		foreach(array_reverse($parentCategoryIds) AS $parentCategoryId) {

			// Load the category
			$parentCategory = Mage::getModel('catalog/category')->load($parentCategoryId);

			// If the current category has a "placeholder" image, use that image
			if($categoryPlaceholderImage = $parentCategory->getData($this->categoryPlaceholderImageAttributeCode)) {
				return Mage::getBaseUrl('media') . 'catalog/category/' . $categoryPlaceholderImage;
			}
		}

		// If no image has been found, return false
		return false;
	}
}