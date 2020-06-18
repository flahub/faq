<?php

namespace Orangecat\Faq\Controller\Adminhtml\Category;

use Orangecat\Faq\Api\Repository\CategoryRepositoryInterface;
use Orangecat\Faq\Controller\Adminhtml\AbstractMassDisable;
use Orangecat\Faq\Helper\AclNames;
use Orangecat\Faq\Model\ResourceModel\Category\Collection as CategoryCollection;

class MassDisable extends AbstractMassDisable
{
    /**
     * @return string
     */
    protected function _getACLName()
    {
        return AclNames::ACL_CATEGORY_SAVE;
    }

    /**
     * @return string
     */
    protected function _getCollectionClass()
    {
        return CategoryCollection::class;
    }

    /**
     * @return string
     */
    protected function _getRepositoryClass()
    {
        return CategoryRepositoryInterface::class;
    }
}
