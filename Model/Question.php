<?php
namespace Orangecat\Faq\Model;

use Orangecat\Faq\Api\Data\QuestionInterface;
use Orangecat\Faq\Model\ResourceModel\Question as ResourceModel;

class Question extends AbstractBaseModel implements QuestionInterface
{
    /**
     * @var string
     */
    const CACHE_TAG = 'faq_question';

    /**
     * @var string
     */
    const KEY_TITLE = 'question';
    /**
     * @var string
     */
    protected $_cacheTag = self::CACHE_TAG;
    /**
     * @var string
     */
    protected $_eventPrefix = 'faq_question';

    /**
     * @var string
     */
    protected $_eventObject = 'question';

    /**
     * @var string
     */
    protected $_idFieldName = self::KEY_ID;

    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * @return int
     */
    public function getCategoryId()
    {
        return $this->getData(self::KEY_CATEGORY_ID);
    }

    /**
     * @param int $categoryId
     *
     * @return void
     */
    public function setCategoryId(int $categoryId)
    {
        $this->setData(self::KEY_CATEGORY_ID, $categoryId);
    }

    /**
     * @return string
     */
    public function getQuestion()
    {
        return $this->getData(self::KEY_QUESTION);
    }

    /**
     * @param string $question
     *
     * @return void
     */
    public function setQuestion(string $question)
    {
        $this->setData(self::KEY_QUESTION, $question);
    }

    /**
     * @return string
     */
    public function getAnswer()
    {
        return $this->getData(self::KEY_ANSWER);
    }

    /**
     * @param string $answer
     *
     * @return void
     */
    public function setAnswer(string $answer)
    {
        $this->setData(self::KEY_ANSWER, $answer);
    }


    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }


}
