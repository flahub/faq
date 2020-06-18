<?php

namespace Orangecat\Faq\Api\Data;

interface DateInterface
{
    const KEY_CREATION_TIME = 'creation_time';
    const KEY_UPDATE_TIME = 'update_time';
    /**
     * @return string
     */
    public function getCreationTime();

    /**
     * @return string
     */
    public function getUpdateTime();
}
