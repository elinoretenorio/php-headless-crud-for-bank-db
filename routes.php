<?php

declare(strict_types=1);

$router->get("/account", "Bank\Account\AccountController::getAll");
$router->post("/account", "Bank\Account\AccountController::insert");
$router->group("/account", function ($router) {
    $router->get("/{id:number}", "Bank\Account\AccountController::get");
    $router->post("/{id:number}", "Bank\Account\AccountController::update");
    $router->delete("/{id:number}", "Bank\Account\AccountController::delete");
});

$router->get("/branch", "Bank\Branch\BranchController::getAll");
$router->post("/branch", "Bank\Branch\BranchController::insert");
$router->group("/branch", function ($router) {
    $router->get("/{id:number}", "Bank\Branch\BranchController::get");
    $router->post("/{id:number}", "Bank\Branch\BranchController::update");
    $router->delete("/{id:number}", "Bank\Branch\BranchController::delete");
});

$router->get("/card", "Bank\Card\CardController::getAll");
$router->post("/card", "Bank\Card\CardController::insert");
$router->group("/card", function ($router) {
    $router->get("/{id:number}", "Bank\Card\CardController::get");
    $router->post("/{id:number}", "Bank\Card\CardController::update");
    $router->delete("/{id:number}", "Bank\Card\CardController::delete");
});

$router->get("/customer", "Bank\Customer\CustomerController::getAll");
$router->post("/customer", "Bank\Customer\CustomerController::insert");
$router->group("/customer", function ($router) {
    $router->get("/{id:number}", "Bank\Customer\CustomerController::get");
    $router->post("/{id:number}", "Bank\Customer\CustomerController::update");
    $router->delete("/{id:number}", "Bank\Customer\CustomerController::delete");
});

$router->get("/customer-branch", "Bank\CustomerBranch\CustomerBranchController::getAll");
$router->post("/customer-branch", "Bank\CustomerBranch\CustomerBranchController::insert");
$router->group("/customer-branch", function ($router) {
    $router->get("/{id:number}", "Bank\CustomerBranch\CustomerBranchController::get");
    $router->post("/{id:number}", "Bank\CustomerBranch\CustomerBranchController::update");
    $router->delete("/{id:number}", "Bank\CustomerBranch\CustomerBranchController::delete");
});

$router->get("/loan", "Bank\Loan\LoanController::getAll");
$router->post("/loan", "Bank\Loan\LoanController::insert");
$router->group("/loan", function ($router) {
    $router->get("/{id:number}", "Bank\Loan\LoanController::get");
    $router->post("/{id:number}", "Bank\Loan\LoanController::update");
    $router->delete("/{id:number}", "Bank\Loan\LoanController::delete");
});

$router->get("/loan-type", "Bank\LoanType\LoanTypeController::getAll");
$router->post("/loan-type", "Bank\LoanType\LoanTypeController::insert");
$router->group("/loan-type", function ($router) {
    $router->get("/{id:number}", "Bank\LoanType\LoanTypeController::get");
    $router->post("/{id:number}", "Bank\LoanType\LoanTypeController::update");
    $router->delete("/{id:number}", "Bank\LoanType\LoanTypeController::delete");
});

$router->get("/transaction", "Bank\Transaction\TransactionController::getAll");
$router->post("/transaction", "Bank\Transaction\TransactionController::insert");
$router->group("/transaction", function ($router) {
    $router->get("/{id:number}", "Bank\Transaction\TransactionController::get");
    $router->post("/{id:number}", "Bank\Transaction\TransactionController::update");
    $router->delete("/{id:number}", "Bank\Transaction\TransactionController::delete");
});

