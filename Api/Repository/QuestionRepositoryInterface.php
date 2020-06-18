<?php

namespace Orangecat\Faq\Api\Repository;

use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;

use Orangecat\Faq\Api\Data\QuestionInterface;

interface QuestionRepositoryInterface
{
    /**
     * @param QuestionInterface $question
     *
     * @return QuestionInterface
     * @throws CouldNotSaveException
     */
    public function save(QuestionInterface $question);

    /**
     * @param int $id
     *
     * @return QuestionInterface
     * @throws NoSuchEntityException
     */
    public function getById(int $id);

    /**
     * @param QuestionInterface $question
     *
     * @return void
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function delete(QuestionInterface $question);

    /**
     * @param int $id
     *
     * @return void
     * @throws NoSuchEntityException
     * @throws CouldNotDeleteException
     */
    public function deleteById(int $id);

    /**
     * @param array $data
     *
     * @return QuestionInterface
     */
    public function create(array $data = []);
}
