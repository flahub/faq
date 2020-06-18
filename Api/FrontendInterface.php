<?php

namespace Orangecat\Faq\Api;

interface FrontendInterface
{
    /**
     * @param int $storeId
     * @return array
     */
    public function getQuestions(int $storeId);

    /**
     * @param int $storeId
     * @return array
     */
    public function getCategories(int $storeId);
}
