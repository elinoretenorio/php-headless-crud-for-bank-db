curl -X GET "localhost:8080/account"

curl -X POST "localhost:8080/account" -H 'Content-Type: application/json' -d'
{
  "balance": "sure",
  "card_id": 4009,
  "customer_id": 5241
}
'

curl -X POST "localhost:8080/account/7738" -H 'Content-Type: application/json' -d'
{
  "balance": "sure",
  "card_id": 4009,
  "customer_id": 5241,
  "id": 7738
}
'

curl -X GET "localhost:8080/account/7738"

curl -X DELETE "localhost:8080/account/7738"

# --

curl -X GET "localhost:8080/branch"

curl -X POST "localhost:8080/branch" -H 'Content-Type: application/json' -d'
{
  "address": "story",
  "name": "three"
}
'

curl -X POST "localhost:8080/branch/3570" -H 'Content-Type: application/json' -d'
{
  "address": "story",
  "id": 3570,
  "name": "three"
}
'

curl -X GET "localhost:8080/branch/3570"

curl -X DELETE "localhost:8080/branch/3570"

# --

curl -X GET "localhost:8080/card"

curl -X POST "localhost:8080/card" -H 'Content-Type: application/json' -d'
{
  "expiration_date": "2021-10-01",
  "is_blocked": "Wide song moment natural place.",
  "number": "control"
}
'

curl -X POST "localhost:8080/card/8769" -H 'Content-Type: application/json' -d'
{
  "expiration_date": "2021-10-01",
  "id": 8769,
  "is_blocked": "Wide song moment natural place.",
  "number": "control"
}
'

curl -X GET "localhost:8080/card/8769"

curl -X DELETE "localhost:8080/card/8769"

# --

curl -X GET "localhost:8080/customer"

curl -X POST "localhost:8080/customer" -H 'Content-Type: application/json' -d'
{
  "date_of_birth": "2021-10-08",
  "first_name": "back",
  "gender": "including",
  "last_name": "read"
}
'

curl -X POST "localhost:8080/customer/7710" -H 'Content-Type: application/json' -d'
{
  "date_of_birth": "2021-10-08",
  "first_name": "back",
  "gender": "including",
  "id": 7710,
  "last_name": "read"
}
'

curl -X GET "localhost:8080/customer/7710"

curl -X DELETE "localhost:8080/customer/7710"

# --

curl -X GET "localhost:8080/customer-branch"

curl -X POST "localhost:8080/customer-branch" -H 'Content-Type: application/json' -d'
{
  "branch_id": 8727,
  "customer_id": 3898
}
'

curl -X POST "localhost:8080/customer-branch/4966" -H 'Content-Type: application/json' -d'
{
  "branch_id": 8727,
  "customer_id": 3898,
  "id": 4966
}
'

curl -X GET "localhost:8080/customer-branch/4966"

curl -X DELETE "localhost:8080/customer-branch/4966"

# --

curl -X GET "localhost:8080/loan"

curl -X POST "localhost:8080/loan" -H 'Content-Type: application/json' -d'
{
  "account_id": 2849,
  "amount_paid": 912.5,
  "due_date": "2021-10-09",
  "loan_type_id": 153,
  "start_date": "2021-10-16"
}
'

curl -X POST "localhost:8080/loan/5617" -H 'Content-Type: application/json' -d'
{
  "account_id": 2849,
  "amount_paid": 912.5,
  "due_date": "2021-10-09",
  "id": 5617,
  "loan_type_id": 153,
  "start_date": "2021-10-16"
}
'

curl -X GET "localhost:8080/loan/5617"

curl -X DELETE "localhost:8080/loan/5617"

# --

curl -X GET "localhost:8080/loan-type"

curl -X POST "localhost:8080/loan-type" -H 'Content-Type: application/json' -d'
{
  "base_amount": 374.3785,
  "base_interest_rate": 541.8,
  "description": "so",
  "type": "recently"
}
'

curl -X POST "localhost:8080/loan-type/8495" -H 'Content-Type: application/json' -d'
{
  "base_amount": 374.3785,
  "base_interest_rate": 541.8,
  "description": "so",
  "id": 8495,
  "type": "recently"
}
'

curl -X GET "localhost:8080/loan-type/8495"

curl -X DELETE "localhost:8080/loan-type/8495"

# --

curl -X GET "localhost:8080/transaction"

curl -X POST "localhost:8080/transaction" -H 'Content-Type: application/json' -d'
{
  "account_id": 9138,
  "amount": 88.0,
  "date": "2021-10-09",
  "description": "not"
}
'

curl -X POST "localhost:8080/transaction/4712" -H 'Content-Type: application/json' -d'
{
  "account_id": 9138,
  "amount": 88.0,
  "date": "2021-10-09",
  "description": "not",
  "id": 4712
}
'

curl -X GET "localhost:8080/transaction/4712"

curl -X DELETE "localhost:8080/transaction/4712"

# --

