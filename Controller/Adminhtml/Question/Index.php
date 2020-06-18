<?php

namespace Orangecat\Faq\Controller\Adminhtml\Question;

use Magento\Backend\Model\View\Result\Page;
use Orangecat\Faq\Helper\AclNames;
use Orangecat\Faq\Controller\Adminhtml\AbstractIndexAction;

class Index extends AbstractIndexAction
{
    protected function _setResultPageParams(Page &$resultPage)
    {
        $resultPage->setActiveMenu('Orangecat_Faq::question');
        $resultPage->addBreadcrumb(__('FAQ Questions'), __('FAQ Questions'));
        $resultPage->addBreadcrumb(__('Manage'), __('Manage'));
        $resultPage->getConfig()->getTitle()->prepend(__('FAQ Questions'));
    }

    /**
     * @return string
     */
    protected function _getACLName()
    {
        return AclNames::ACL_QUESTION_VIEW;
    }
}
