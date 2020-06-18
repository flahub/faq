<?php

namespace Orangecat\Faq\Block\Index;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Orangecat\Faq\Model\ResourceModel\Question\Collection as QuestionCollection;
use Orangecat\Faq\Model\ResourceModel\Category\Collection as CategoryCollection;

class Index extends Template
{
    /**
     * @var QuestionCollection
     */
    private $_questionCollection;

    /**
     * @var CategoryCollection
     */
    private $_categoryCollection;

    /**
     * Construct
     *
     * @param Context $context
     * @param QuestionCollection $questionCollection
     * @param CategoryCollection $categoryCollection
     * @param array $data
     */
    public function __construct(
        Context $context,
        QuestionCollection $questionCollection,
        CategoryCollection $categoryCollection,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_questionCollection = $questionCollection;
        $this->_categoryCollection = $categoryCollection;
    }

    /**
     * Simple example with not optimal code
     *
     * @return array
     */
    public function getQuestions()
    {
        $this->_questionCollection->addFilter('status', 1);
        $this->_categoryCollection->addFilter('status', 1);

        $questions = $this->_questionCollection->getData();
        $categories = $this->_categoryCollection->getData();

        foreach ($questions as &$question) {
            $question['category'] = $this->_getCategoryById($categories, $question['category_id']);
        }
        return $questions;
    }

    /**
     * @return $this
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->pageConfig->getTitle()->set(__('F.A.Q.'));
        $this->pageConfig->setDescription(__('F.A.Q.'));
        $this->pageConfig->setKeywords(__('faq, extension'));
        return $this;
    }

    /**
     * @param array $categories
     * @param int $id
     * @return string
     */
    private function _getCategoryById(array $categories, $id)
    {
        foreach ($categories as $category) {
            if ($category['category_id'] == $id) {
                return $category['title'];
            }
        }
        return 'none';
    }
}
