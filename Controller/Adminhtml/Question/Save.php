<?php

namespace Orangecat\Faq\Controller\Adminhtml\Question;

use Orangecat\Faq\Api\Data\QuestionInterface;
use Orangecat\Faq\Api\Repository\QuestionRepositoryInterface;
use Orangecat\Faq\Controller\Adminhtml\AbstractSaveAction;
use Orangecat\Faq\Helper\AclNames;

class Save extends AbstractSaveAction
{
    /**
     * @return string
     */
    protected function _getACLName()
    {
        return AclNames::ACL_QUESTION_SAVE;
    }

    /**
     * @return string
     */
    protected function _getRepositoryClass()
    {
        return QuestionRepositoryInterface::class;
    }

    /**
     * @return string
     */
    protected function _getIdFieldName()
    {
        return QuestionInterface::KEY_ID;
    }

    /**
     * @param array $data
     */
    protected function _prepareData(array &$data)
    {
        $data[QuestionInterface::KEY_STORE_IDS] = implode(',', $data[QuestionInterface::KEY_STORE_IDS]);
    }
}
