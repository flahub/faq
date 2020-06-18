<?php

namespace Orangecat\Faq\Controller\Adminhtml\Category;

use Orangecat\Faq\Api\Repository\CategoryRepositoryInterface;
use Orangecat\Faq\Controller\Adminhtml\AbstractMassDelete;
use Orangecat\Faq\Helper\AclNames;
use Orangecat\Faq\Model\ResourceModel\Category\Collection as CategoryCollection;

class MassDelete extends AbstractMassDelete
{
    /**
     * @return string
     */
    protected function _getACLName(): string
    {
        return AclNames::ACL_CATEGORY_DELETE;
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
