<?php

namespace Orangecat\Faq\Api\Data;

interface CategoryInterface extends BaseInterface
{
    const KEY_ID = 'category_id';
    const KEY_TITLE = 'title';
    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     *
     * @return void
     */
    public function setTitle(string $title);

}
