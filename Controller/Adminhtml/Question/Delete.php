<?php

namespace Orangecat\Faq\Controller\Adminhtml\Question;

use Orangecat\Faq\Api\Repository\QuestionRepositoryInterface;
use Orangecat\Faq\Helper\AclNames;
use Orangecat\Faq\Controller\Adminhtml\AbstractDeleteAction;

class Delete extends AbstractDeleteAction
{
    /**
     * @return string
     */
    protected function _getACLName()
    {
        return AclNames::ACL_QUESTION_DELETE;
    }

    /**
     * @return string
     */
    protected function _getRepositoryClass()
    {
        return QuestionRepositoryInterface::class;
    }
}
