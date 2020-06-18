<?php

namespace Orangecat\Faq\Controller\Adminhtml\Category;

use Magento\Backend\Model\View\Result\Page;
use Orangecat\Faq\Helper\AclNames;
use Orangecat\Faq\Controller\Adminhtml\AbstractIndexAction;

class Index extends AbstractIndexAction
{
    protected function _setResultPageParams(Page &$resultPage)
    {
        $resultPage->setActiveMenu('Orangecat_Faq::category');
        $resultPage->addBreadcrumb(__('FAQ Categories'), __('FAQ Categories'));
        $resultPage->addBreadcrumb(
            __('Manage'), __('Manage')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('FAQ Categories'));
    }

    /**
     * @return string
     */
    protected function _getACLName()
    {
        return AclNames::ACL_CATEGORY_VIEW;
    }
}
