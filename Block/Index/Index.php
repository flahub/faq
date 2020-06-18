<?php

namespace Orangecat\Faq\Block\Index;

use Exception;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Store\Model\StoreManagerInterface;
use Orangecat\Faq\Helper\Constants;

class Index extends Template
{
    /**
     * @type StoreManagerInterface
     */
    public $storeManager;

    /**
     * Construct
     *
     * @param Context $context
    * @param array $data
     */
    public function __construct(
        Context $context,
        array $data = []
    ) {
        $this->storeManager = $context->getStoreManager();

        parent::__construct($context, $data);
     }

    /**
     * @return int
     */
    public function getStoreId()
    {
        try {
            return $this->storeManager->getStore()->getId();
        } catch (Exception $exception) {
            return 0;
        }
    }

    /**
     * @return string
     */
    public function getApiUrl()
    {
        return Constants::API_URL;
    }
}
