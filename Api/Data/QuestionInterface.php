<?php

namespace Orangecat\Faq\Api\Data;

interface QuestionInterface extends BaseInterface
{
    const KEY_ID = 'faq_id';
    const KEY_CATEGORY_ID = 'category_id';
    const KEY_ANSWER = 'answer';
    const KEY_QUESTION = 'question';

    /**
     * @return int
     */
   // public function getId();

    /**
     * @return int
     */
    public function getCategoryId();

    /**
     * @param int $categoryId
     *
     * @return void
     */
    public function setCategoryId(int $categoryId);

    /**
     * @return string
     */
    public function getQuestion();

    /**
     * @param string $question
     *
     * @return void
     */
    public function setQuestion(string $question);

    /**
     * @return string
     */
    public function getAnswer();

    /**
     * @param string $answer
     *
     * @return void
     */
    public function setAnswer(string $answer);

}
