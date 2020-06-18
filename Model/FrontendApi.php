<?php

namespace Orangecat\Faq\Model;

use Exception;
use Orangecat\Faq\Api\FrontendInterface;
use Orangecat\Faq\Api\Data\QuestionInterface;
use Orangecat\Faq\Api\Repository\QuestionRepositoryInterface;
use Orangecat\Faq\Model\ResourceModel\Category\Collection as CategoryCollection;
use Orangecat\Faq\Model\ResourceModel\Question\Collection as QuestionCollection;
use Orangecat\Faq\Model\ResourceModel\Category\CollectionFactory as CategoryCollectionFactory;
use Orangecat\Faq\Model\ResourceModel\Question\CollectionFactory as QuestionCollectionFactory;

class FrontendApi implements FrontendInterface
{
    /**
     * @var QuestionRepositoryInterface
     */
    protected $questionRepository;

    /**
     * @var CategoryCollectionFactory
     */
    protected $categoryCollectionFactory;

    /**
     * @var QuestionCollectionFactory
     */
    protected $questionCollectionFactory;

    /**
     * @param QuestionRepositoryInterface $questionRepository
     * @param CategoryCollectionFactory $categoryCollectionFactory
     * @param QuestionCollectionFactory $questionCollectionFactory
     */
    public function __construct(
        QuestionRepositoryInterface $questionRepository,
        CategoryCollectionFactory $categoryCollectionFactory,
        QuestionCollectionFactory $questionCollectionFactory
    ) {
        $this->questionRepository = $questionRepository;
        $this->categoryCollectionFactory = $categoryCollectionFactory;
        $this->questionCollectionFactory = $questionCollectionFactory;
    }

    /**
     * @param int $storeId
     * @return array
     */
    public function getQuestions(int $storeId)
    {
        return $this->_getQuestionCollection()->getDataByStoreId($storeId)->getData();
    }

    /**
     * @param int $storeId
     * @return array
     */
    public function getCategories(int $storeId)
    {
        return $this->_getCategoryCollection()->getDataByStoreId($storeId)->getData();
    }

    /**
     * @return CategoryCollection
     */
    private function _getCategoryCollection()
    {
        return $this->categoryCollectionFactory->create();
    }

    /**
     * @return QuestionCollection
     */
    private function _getQuestionCollection()
    {
        return $this->questionCollectionFactory->create();
    }
}
