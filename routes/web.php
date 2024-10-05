<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SavingController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ExpenseController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Home route
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
});

// Dashboard route
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// User routes
Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

// Category routes
Route::middleware('auth')->group(function () {
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::patch('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

// Saving routes
Route::middleware('auth')->group(function () {
    Route::get('/savings', [SavingController::class, 'index'])->name('savings.index');
    Route::get('/savings/create', [SavingController::class, 'create'])->name('savings.create');
    Route::post('/savings', [SavingController::class, 'store'])->name('savings.store');
    Route::get('/savings/{id}', [SavingController::class, 'show'])->name('savings.show');
    Route::get('/savings/{id}/edit', [SavingController::class, 'edit'])->name('savings.edit');
    Route::patch('/savings/{id}', [SavingController::class, 'update'])->name('savings.update');
    Route::delete('/savings/{id}', [SavingController::class, 'destroy'])->name('savings.destroy');
});

// Transaction routes
Route::middleware('auth')->group(function () {
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
    Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show');
    Route::get('/transactions/{id}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
    Route::patch('/transactions/{id}', [TransactionController::class, 'update'])->name('transactions.update');
    Route::delete('/transactions/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');
});

// Budget routes
Route::middleware('auth')->group(function () {
    Route::get('/budgets', [BudgetController::class, 'index'])->name('budgets.index');
    Route::get('/budgets/create', [BudgetController::class, 'create'])->name('budgets.create');
    Route::post('/budgets', [BudgetController::class, 'store'])->name('budgets.store');
    Route::get('/budgets/{id}', [BudgetController::class, 'show'])->name('budgets.show');
    Route::get('/budgets/{id}/edit', [BudgetController::class, 'edit'])->name('budgets.edit');
    Route::patch('/budgets/{id}', [BudgetController::class, 'update'])->name('budgets.update');
    Route::delete('/budgets/{id}', [BudgetController::class, 'destroy'])->name('budgets.destroy');
});

// Income routes
Route::middleware('auth')->group(function () {
    Route::get('/incomes', [IncomeController::class, 'index'])->name('incomes.index');
    Route::get('/incomes/create', [IncomeController::class, 'create'])->name('incomes.create');
    Route::post('/incomes', [IncomeController::class, 'store'])->name('incomes.store');
    Route::get('/incomes/{id}', [IncomeController::class, 'show'])->name('incomes.show');
    Route::get('/incomes/{id}/edit', [IncomeController::class, 'edit'])->name('incomes.edit');
    Route::patch('/incomes/{id}', [IncomeController::class, 'update'])->name('incomes.update');
    Route::delete('/incomes/{id}', [IncomeController::class, 'destroy'])->name('incomes.destroy');
});

// Payment routes
Route::middleware('auth')->group(function () {
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/payments/{id}', [PaymentController::class, 'show'])->name('payments.show');
    Route::get('/payments/{id}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
    Route::patch('/payments/{id}', [PaymentController::class, 'update'])->name('payments.update');
    Route::delete('/payments/{id}', [PaymentController::class, 'destroy'])->name('payments.destroy');
});

// Expense routes
Route::middleware('auth')->group(function () {
    Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');
    Route::get('/expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');
    Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');
    Route::get('/expenses/{id}', [ExpenseController::class, 'show'])->name('expenses.show');
    Route::get('/expenses/{id}/edit', [ExpenseController::class, 'edit'])->name('expenses.edit');
    Route::patch('/expenses/{id}', [ExpenseController::class, 'update'])->name('expenses.update');
    Route::delete('/expenses/{id}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');
});

// Auth routes
require __DIR__.'/auth.php';
