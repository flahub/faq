<?php

namespace Orangecat\Faq\Controller\Adminhtml\Question;

use Magento\Backend\Model\View\Result\Page;
use Orangecat\Faq\Api\Data\BaseInterface;
use Orangecat\Faq\Api\Repository\QuestionRepositoryInterface;
use Orangecat\Faq\Controller\Adminhtml\AbstractEditAction;
use Orangecat\Faq\Helper\AclNames;

class Edit extends AbstractEditAction
{
    /**
     * @return string
     */
    protected function _getACLName()
    {
        return AclNames::ACL_QUESTION_VIEW;
    }

    protected function _getRegisterName()
    {
        return 'faq_question';
    }

    /**
     * @return string
     */
    protected function _getRepositoryClass()
    {
        return QuestionRepositoryInterface::class;
    }

    /**
     * @param Page $resultPage
     * @param BaseInterface $model
     * @return Page
     */
    protected function _initAction(Page $resultPage, BaseInterface $model)
    {
        $id = $model->getId();
        $resultPage->setActiveMenu('Orangecat_Faq::question')
            ->addBreadcrumb(__('Faq'), __('Faq'))
            ->addBreadcrumb(__('Manage'), __('Manage'));
        $resultPage->addBreadcrumb(
            $id ? __('Edit') : __('New'),
            $id ? __('Edit') : __('New')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Question'));
        $resultPage->getConfig()->getTitle()->prepend(
            $model->getId() ? $model->getTitle() : __('New question')
        );

        return $resultPage;
    }
}
