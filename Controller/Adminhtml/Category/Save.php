<?php

namespace Orangecat\Faq\Controller\Adminhtml\Category;

use Orangecat\Faq\Api\Data\CategoryInterface;
use Orangecat\Faq\Api\Repository\CategoryRepositoryInterface;
use Orangecat\Faq\Controller\Adminhtml\AbstractSaveAction;
use Orangecat\Faq\Helper\AclNames;

class Save extends AbstractSaveAction
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
    protected function _getRepositoryClass()
    {
        return CategoryRepositoryInterface::class;
    }

    /**
     * @return string
     */
    protected function _getIdFieldName()
    {
        return CategoryInterface::KEY_ID;
    }

    /**
     * @param array $data
     */
    protected function _prepareData(array &$data)
    {
        $data[CategoryInterface::KEY_STORE_IDS] = implode(',', $data[CategoryInterface::KEY_STORE_IDS]);
    }
}
