<?php

namespace Orangecat\Faq\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use Orangecat\Faq\Api\Data\BaseInterface;
use Orangecat\Faq\Api\Data\DateInterface;
use Orangecat\Faq\Api\Data\StatusInterface;

abstract class AbstractBaseModel extends AbstractModel
    implements BaseInterface, StatusInterface, DateInterface, IdentityInterface
{
    /**
     * @return string
     */
    public function getCreationTime()
    {
        return $this->getData(self::KEY_CREATION_TIME);
    }

    /**
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->getData(self::KEY_UPDATE_TIME);
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->getData(self::KEY_STATUS);
    }

    /**
     * @param int $status
     *
     * @return void
     */
    public function setStatus(int $status)
    {
        $this->setData(self::KEY_STATUS, $status);
    }

    /**
     * @return  void
     */
    public function activate()
    {
        $this->setStatus(self::STATUS_ACTIVE);
    }

    /**
     * @return  void
     */
    public function deactivate()
    {
        $this->setStatus(self::STATUS_INACTIVE);
    }

    /**
     * @return int
     */
    public function getSortOrder()
    {
        return $this->getData(self::KEY_SORT_ORDER);
    }

    /**
     * @param int $sortOrder
     *
     * @return void
     */
    public function setSortOrder(int $sortOrder)
    {
        $this->setData(self::KEY_SORT_ORDER, $sortOrder);
    }

    /**
     * @return string
     */
    public function getStoreIds()
    {
        return $this->getData(self::KEY_STORE_IDS);
    }

    /**
     * @param string $storeIds
     *
     * @return void
     */
    public function setStoreIds(string $storeIds)
    {
        $this->setData(self::KEY_STORE_IDS, $storeIds);
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->getStatus() == self::STATUS_ACTIVE;
    }
}
