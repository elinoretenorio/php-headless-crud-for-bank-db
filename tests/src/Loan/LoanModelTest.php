<?php

declare(strict_types=1);

namespace Bank\Tests\Loan;

use PHPUnit\Framework\TestCase;
use Bank\Loan\{ LoanDto, LoanModel };

class LoanModelTest extends TestCase
{
    private array $input;
    private LoanDto $dto;
    private LoanModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 7774,
            "account_id" => 4985,
            "loan_type_id" => 1901,
            "amount_paid" => 441.18,
            "start_date" => "2021-10-07",
            "due_date" => "2021-10-07",
        ];
        $this->dto = new LoanDto($this->input);
        $this->model = new LoanModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new LoanModel(null);

        $this->assertInstanceOf(LoanModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 5460;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetAccountId(): void
    {
        $this->assertEquals($this->dto->accountId, $this->model->getAccountId());
    }

    public function testSetAccountId(): void
    {
        $expected = 6000;
        $model = $this->model;
        $model->setAccountId($expected);

        $this->assertEquals($expected, $model->getAccountId());
    }

    public function testGetLoanTypeId(): void
    {
        $this->assertEquals($this->dto->loanTypeId, $this->model->getLoanTypeId());
    }

    public function testSetLoanTypeId(): void
    {
        $expected = 1432;
        $model = $this->model;
        $model->setLoanTypeId($expected);

        $this->assertEquals($expected, $model->getLoanTypeId());
    }

    public function testGetAmountPaid(): void
    {
        $this->assertEquals($this->dto->amountPaid, $this->model->getAmountPaid());
    }

    public function testSetAmountPaid(): void
    {
        $expected = 496.00;
        $model = $this->model;
        $model->setAmountPaid($expected);

        $this->assertEquals($expected, $model->getAmountPaid());
    }

    public function testGetStartDate(): void
    {
        $this->assertEquals($this->dto->startDate, $this->model->getStartDate());
    }

    public function testSetStartDate(): void
    {
        $expected = "2021-10-09";
        $model = $this->model;
        $model->setStartDate($expected);

        $this->assertEquals($expected, $model->getStartDate());
    }

    public function testGetDueDate(): void
    {
        $this->assertEquals($this->dto->dueDate, $this->model->getDueDate());
    }

    public function testSetDueDate(): void
    {
        $expected = "2021-10-14";
        $model = $this->model;
        $model->setDueDate($expected);

        $this->assertEquals($expected, $model->getDueDate());
    }

    public function testToDto(): void
    {
        $this->assertEquals($this->dto, $this->model->toDto());
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals($this->input, $this->model->jsonSerialize());
    }
}