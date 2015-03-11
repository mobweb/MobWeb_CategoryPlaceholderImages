# MobWeb_CategoryPlaceholderImages extension for Magento

This extension allows you to to define a "placeholder" category image for each category that will be used as the category image if a category does not have a category image. If the category also doesn't have a "placeholder" image, then the parent category's "placeholder" image is used, traversing all the way back up to the root category. So basically you could define a "placeholder" image in the root category and that would be used for all categories that don't have a category image or "placeholder" category image.

## Usage

Upload your "placeholder" images directly on the category page where you'd also upload the normal category image. The upload field for the "placeholder" image has been added at the bottom of the page.

Next, replace any calls to ```$_category->getImageUrl()``` with ```Mage::helper('categoryplaceholderimages')->getImageUrl($_category)``` wherever you wish to make use of this new "placeholder" functionality.

## Installation

Install using [colinmollenhour/modman](https://github.com/colinmollenhour/modman/). Afterwards make sure that you re-create the index for the `Category Flat Data`, otherwise the custom images won't be available in the frontend!

## Questions? Need help?

Most of my repositories posted here are projects created for customization requests for clients, so they probably aren't very well documented and the code isn't always 100% flexible. If you have a question or are confused about how something is supposed to work, feel free to get in touch and I'll try and help: [info@mobweb.ch](mailto:info@mobweb.ch).