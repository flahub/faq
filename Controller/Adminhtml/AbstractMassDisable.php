<?php

namespace Orangecat\Faq\Controller\Adminhtml;

use Exception;
use Magento\Framework\Phrase;
use Orangecat\Faq\Api\Data\StatusInterface;

abstract class AbstractMassDisable extends AbstractMassAction
{
    /**
     * @param int $collectionSize
     * @return Phrase
     */
    protected function _getSuccessMessage(int $collectionSize)
    {
        return __('A total of %1 record(s) have been disabled.', $collectionSize);
    }

    /**
     * @param StatusInterface $item
     * @return bool
     */
    protected function _updateItem(&$item)
    {
        try {
            $item->deactivate();
            $this->_getRepository()->save($item);

            return true;
        } catch (Exception $exception) {
            return false;
        }
    }
}
