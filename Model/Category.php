<?php

namespace Orangecat\Faq\Model;

use Orangecat\Faq\Api\Data\CategoryInterface;
use Orangecat\Faq\Model\ResourceModel\Category as ResourceModel;

class Category extends AbstractBaseModel implements CategoryInterface
{
    /**
     * CMS page cache tag
     */
    const CACHE_TAG = 'faq_category';

    /**
     * Model cache tag for clear cache in after save and after delete
     *
     * @var string
     */
    protected $_cacheTag = self::CACHE_TAG;

    /**
     * @var string
     */
    protected $_eventPrefix = 'faq_category';

    /**
     * @var string
     */
    protected $_eventObject = 'category';

    /**
     * @var string
     */
    protected $_idFieldName = self::KEY_ID;

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->getData(self::KEY_TITLE);
    }

    /**
     * @param string $title
     *
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->setData(self::KEY_TITLE, $title);
    }

    /**
     * Return unique ID(s) for each object in system
     *
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

}
