<?php

declare(strict_types=1);

namespace Bank\Tests\Customer;

use PHPUnit\Framework\TestCase;
use Bank\Customer\{ CustomerDto, CustomerModel };

class CustomerModelTest extends TestCase
{
    private array $input;
    private CustomerDto $dto;
    private CustomerModel $model;

    protected function setUp(): void
    {
        $this->input = [
            "id" => 9613,
            "first_name" => "know",
            "last_name" => "art",
            "date_of_birth" => "2021-10-02",
            "gender" => "reflect",
        ];
        $this->dto = new CustomerDto($this->input);
        $this->model = new CustomerModel($this->dto);
    }

    protected function tearDown(): void
    {
        unset($this->input);
        unset($this->dto);
        unset($this->model);
    }

    public function testModel_ReturnsInstance(): void
    {
        $model = new CustomerModel(null);

        $this->assertInstanceOf(CustomerModel::class, $model);
    }

    public function testGetId(): void
    {
        $this->assertEquals($this->dto->id, $this->model->getId());
    }

    public function testSetId(): void
    {
        $expected = 7798;
        $model = $this->model;
        $model->setId($expected);

        $this->assertEquals($expected, $model->getId());
    }

    public function testGetFirstName(): void
    {
        $this->assertEquals($this->dto->firstName, $this->model->getFirstName());
    }

    public function testSetFirstName(): void
    {
        $expected = "second";
        $model = $this->model;
        $model->setFirstName($expected);

        $this->assertEquals($expected, $model->getFirstName());
    }

    public function testGetLastName(): void
    {
        $this->assertEquals($this->dto->lastName, $this->model->getLastName());
    }

    public function testSetLastName(): void
    {
        $expected = "tell";
        $model = $this->model;
        $model->setLastName($expected);

        $this->assertEquals($expected, $model->getLastName());
    }

    public function testGetDateOfBirth(): void
    {
        $this->assertEquals($this->dto->dateOfBirth, $this->model->getDateOfBirth());
    }

    public function testSetDateOfBirth(): void
    {
        $expected = "2021-09-27";
        $model = $this->model;
        $model->setDateOfBirth($expected);

        $this->assertEquals($expected, $model->getDateOfBirth());
    }

    public function testGetGender(): void
    {
        $this->assertEquals($this->dto->gender, $this->model->getGender());
    }

    public function testSetGender(): void
    {
        $expected = "according";
        $model = $this->model;
        $model->setGender($expected);

        $this->assertEquals($expected, $model->getGender());
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