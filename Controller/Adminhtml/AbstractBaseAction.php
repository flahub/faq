<?php

namespace Orangecat\Faq\Controller\Adminhtml;

use Magento\Backend\App\Action;

abstract class AbstractBaseAction extends Action
{
    /**
     * @return boolean
     */
    protected function _isAllowed(): bool
    {
        return $this->_authorization->isAllowed($this->_getACLName());
    }

    /**
     * @return string
     */
    abstract protected function _getACLName();
}
