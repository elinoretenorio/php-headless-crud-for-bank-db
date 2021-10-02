<?php

declare(strict_types=1);

// Core

$container->add("Pdo", PDO::class)
    ->addArgument("mysql:dbname={$_ENV["DB_NAME"]};host={$_ENV["DB_HOST"]}")
    ->addArgument($_ENV["DB_USER"])
    ->addArgument($_ENV["DB_PASS"])
    ->addArgument([]);
$container->add("Database", Bank\Database\PdoDatabase::class)
    ->addArgument("Pdo");

// Account

$container->add("AccountRepository", Bank\Account\AccountRepository::class)
    ->addArgument("Database");
$container->add("AccountService", Bank\Account\AccountService::class)
    ->addArgument("AccountRepository");
$container->add(Bank\Account\AccountController::class)
    ->addArgument("AccountService");

// Branch

$container->add("BranchRepository", Bank\Branch\BranchRepository::class)
    ->addArgument("Database");
$container->add("BranchService", Bank\Branch\BranchService::class)
    ->addArgument("BranchRepository");
$container->add(Bank\Branch\BranchController::class)
    ->addArgument("BranchService");

// Card

$container->add("CardRepository", Bank\Card\CardRepository::class)
    ->addArgument("Database");
$container->add("CardService", Bank\Card\CardService::class)
    ->addArgument("CardRepository");
$container->add(Bank\Card\CardController::class)
    ->addArgument("CardService");

// Customer

$container->add("CustomerRepository", Bank\Customer\CustomerRepository::class)
    ->addArgument("Database");
$container->add("CustomerService", Bank\Customer\CustomerService::class)
    ->addArgument("CustomerRepository");
$container->add(Bank\Customer\CustomerController::class)
    ->addArgument("CustomerService");

// CustomerBranch

$container->add("CustomerBranchRepository", Bank\CustomerBranch\CustomerBranchRepository::class)
    ->addArgument("Database");
$container->add("CustomerBranchService", Bank\CustomerBranch\CustomerBranchService::class)
    ->addArgument("CustomerBranchRepository");
$container->add(Bank\CustomerBranch\CustomerBranchController::class)
    ->addArgument("CustomerBranchService");

// Loan

$container->add("LoanRepository", Bank\Loan\LoanRepository::class)
    ->addArgument("Database");
$container->add("LoanService", Bank\Loan\LoanService::class)
    ->addArgument("LoanRepository");
$container->add(Bank\Loan\LoanController::class)
    ->addArgument("LoanService");

// LoanType

$container->add("LoanTypeRepository", Bank\LoanType\LoanTypeRepository::class)
    ->addArgument("Database");
$container->add("LoanTypeService", Bank\LoanType\LoanTypeService::class)
    ->addArgument("LoanTypeRepository");
$container->add(Bank\LoanType\LoanTypeController::class)
    ->addArgument("LoanTypeService");

// Transaction

$container->add("TransactionRepository", Bank\Transaction\TransactionRepository::class)
    ->addArgument("Database");
$container->add("TransactionService", Bank\Transaction\TransactionService::class)
    ->addArgument("TransactionRepository");
$container->add(Bank\Transaction\TransactionController::class)
    ->addArgument("TransactionService");

