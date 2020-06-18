<?php

namespace Orangecat\Faq\Controller\Adminhtml\Question;

use Orangecat\Faq\Api\Repository\QuestionRepositoryInterface;
use Orangecat\Faq\Controller\Adminhtml\AbstractMassDelete;
use Orangecat\Faq\Helper\AclNames;
use Orangecat\Faq\Model\ResourceModel\Question\Collection as QuestionCollection;

class MassDelete extends AbstractMassDelete
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
    protected function _getCollectionClass()
    {
        return QuestionCollection::class;
    }

    /**
     * @return string
     */
    protected function _getRepositoryClass()
    {
        return QuestionRepositoryInterface::class;
    }
}
