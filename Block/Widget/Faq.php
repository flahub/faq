<?php

namespace Orangecat\Faq\Block\Widget;

use Exception;
use Magento\Widget\Block\BlockInterface;
use Magento\Framework\View\Element\Template;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\View\Element\Template\Context;
use Orangecat\Faq\Helper\Constants;

class Faq extends Template implements BlockInterface
{
    protected $_template = "widget/view.phtml";

    /**
     * @type StoreManagerInterface
     */
    public $storeManager;

    /**
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
