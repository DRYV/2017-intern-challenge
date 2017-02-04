# 2017 Intern Challenge
=====
Prerequisites
-
1. PHP version 5.5 and above (this code is intended for php 7.1 but is backwards compatible)
1. [Composer](https://getcomposer.org/doc/00-intro.md) if you want to run everything locally or [Laravel Homestead](https://laravel.com/docs/5.4/homestead) if you want to run a virtual machine

Instructions
-
1. Fork this repository to your personal github
1. Clone that repository onto your local machine (or Homestead)
1. run `composer install` in the repo directory from terminal, this will install all dependencies and the testing framework
1. Complete the `getProductTotal` function of the App\Services\CashRegister class
1. Complete the two empty tests in /tests/CashRegisterTest
1. Run your tests by running `vendor/bin/phpunit` and returning 'OK (3 tests, x assertions)'
1. Send a link to your fork to mickey@dryv.com

Database
-
**Orders Table**

| id | name       |
|----|------------|
| 1  | DRYV Order |

**Transactions Table**

| id | order_id | status   | amount | currency |
|----|----------|----------|--------|----------|
| 1  | 1        | COMPLETE | 400    | USD      |
| 2  | 1        | FAILED   | 600    | USD      |
| 3  | 1        | COMPLETE | 600    | USD      |

**Products Table**

| id | order_id | quantity | amount | currency |
|----|----------|----------|--------|----------|
| 1  | 1        | 1        | 200    | USD      |
| 2  | 1        | 4        | 100    | USD      |
| 3  | 1        | 2        | 200    | USD      |

Notes
-
* We use the Fowler money pattern so all the values you see are in the base currency unit (cents for USD)
* The "total" of each product is its quantity x amount

Good luck!