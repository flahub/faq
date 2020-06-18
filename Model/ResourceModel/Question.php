<?php
namespace Orangecat\Faq\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Orangecat\Faq\Helper\Constants;
use Orangecat\Faq\Model\Question as Model;

class Question extends AbstractDb
{
    const MAIN_TABLE = Constants::DB_PREFIX . 'faq';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(self::MAIN_TABLE, Model::KEY_ID);
    }
}

