<?php

namespace Orangecat\Faq\Controller\Adminhtml;

use Exception;
use Magento\Framework\Phrase;

abstract class AbstractMassDelete extends AbstractMassAction
{
    /**
     * @param Object $item
     * @return bool
     */
    protected function _updateItem(&$item)
    {
        try {
            $this->_getRepository()->delete($item);

            return true;
        } catch (Exception $exception) {
            return false;
        }
    }

    /**
     * @param int $collectionSize
     * @return Phrase
     */
    protected function _getSuccessMessage(int $collectionSize)
    {
        return __('A total of %1 record(s) have been deleted.', $collectionSize);
    }
}
