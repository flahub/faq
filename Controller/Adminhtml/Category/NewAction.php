<?php

namespace Orangecat\Faq\Controller\Adminhtml\Category;

use Orangecat\Faq\Helper\AclNames;
use Orangecat\Faq\Controller\Adminhtml\AbstractNewAction;

class NewAction extends AbstractNewAction
{
    /**
     * @return string
     */
    protected function _getACLName()
    {
        return AclNames::ACL_CATEGORY_SAVE;
    }
}
