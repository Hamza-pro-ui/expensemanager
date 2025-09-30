# Laravel Expense Manager (Modular API)

This is a self-contained **Expense Management Module** built using **Laravel 12** with a **modular architecture**. It supports full CRUD operations for expenses via a RESTful API, and is designed with ERP-quality clean code principles in mind.

---

## Features

- Modular folder structure (`Modules/Expenses`)
- Expense CRUD (Create, List, Update, Delete)
- Filter by category and date range
- UUID-based expense IDs
- Laravel Form Requests for validation
- Service Layer for business logic
- Event-Listener system (`ExpenseCreated` → `SendExpenseNotification`)
- Swagger API Docs via [Scribe](https://scribe.knuckles.wtf/)
- Laravel Resources for clean API formatting
- PHPUnit feature test included 

---

## Project Structure

app/
└── Modules/
└── Expenses/
├── Controllers/
├── Requests/
├── Services/
├── Models/
├── Resources/
├── Events/
├── Listeners/
├── Routes/
└── ExpenseServiceProvider.php


## Setup Instructions

### 1. Clone the repo

git clone https://github.com/Hamza-pro-ui/expensemanager.git
cd expensemanager

### 2. Install dependencies
composer install

### 3. Configure your environment

cp .env.example .env
php artisan key:generate

### 4. Run migrations

php artisan migrate

### 5. Generate API docs

php artisan scribe:generate


## Running Tests

php artisan test

## API Endpoints

Method	Endpoint	Description
GET	/api/expenses	List all expenses (optional filters)
POST	/api/expenses	Create new expense
PUT	/api/expenses/{id}	Update an expense
DELETE	/api/expenses/{id}	Delete an expense

You can view all details in the /docs Swagger interface.

## Events & Notifications

Event: ExpenseCreated

Listener: SendExpenseNotification

## Notes

To avoid SSL verification issues when calling external APIs locally, disable SSL with:

Http::withoutVerifying()->get($url);

Note: This is only for local testing and should not be used in production.

## Time spent

he estimated time spent on this assessment: **6–8 hours**

Breakdown:
- Project setup and module structure: ~1.5 hours
- Expense CRUD implementation (Controller, Service, Requests): ~2 hours
- Event, Listener, and Notification wiring: ~1 hour
- Swagger (Scribe) integration and documentation: ~1.5 hours
- Testing and final review: ~2 hours


## License

Author

Name: Hamza Hamid

Role: Backend Developer

Location: Dubai, UAE
