<?php

namespace Orangecat\Faq\Api\Data;

interface BaseInterface
{
    const KEY_STORE_IDS = 'store_ids';
    const KEY_SORT_ORDER = 'sort_order';

    /**
     * @return int
     */
    public function getId();

    /**
     * @return int
     */
    public function getSortOrder();

    /**
     * @param int $sortOrder
     *
     * @return void
     */
    public function setSortOrder(int $sortOrder);

    /**
     * @return string
     */
    public function getStoreIds();

    /**
     * @param string $storeIds
     *
     * @return void
     */
    public function setStoreIds(string $storeIds);
}
