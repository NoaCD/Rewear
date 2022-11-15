<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Livewire\Admin\CreateProduct;
use App\Http\Livewire\Admin\EditProduct;
use App\Http\Livewire\Admin\ShowProducts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PostCategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Livewire\Admin\BrandComponent;
use App\Http\Livewire\Admin\CityComponent;
use App\Http\Livewire\Admin\DepartmentComponent;
use App\Http\Livewire\Admin\EditPlan;
use App\Http\Livewire\Admin\PostCategory;
use App\Http\Livewire\Admin\ShowCategory;
use App\Http\Livewire\Admin\ShowDepartment;
use App\Http\Livewire\Admin\ShowPlans;
use App\Http\Livewire\Admin\UserComponent;

Route::get('/', ShowProducts::class)->name('admin.products');
Route::get('products/create', CreateProduct::class)->name('admin.products.create');
Route::get('products/{product}/edit', EditProduct::class)->name('admin.products.edit');
Route::post('products/{product}/files', [ProductController::class, 'files'])->name('admin.products.files');
Route::post('products/{product}/filesmain', [ProductController::class, 'filesmain'])->name('admin.products.filesmain');
Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories.index');
Route::get('categories/{category}', ShowCategory::class)->name('admin.categories.show');
Route::get('colors', [ColorController::class, 'index'])->name('admin.colors.index');
Route::get('sizes', [SizeController::class, 'index'])->name('admin.sizes.index');
Route::get('brands', BrandComponent::class, 'index')->name('admin.brands.index');
Route::get('orders', [OrderController::class, 'index'])->name('admin.orders.index');
Route::get('orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');
Route::get('departments', DepartmentComponent::class)->name('admin.departments.index');
Route::get('departments/{department}', ShowDepartment::class)->name('admin.departments.show');
Route::get('departments/cities/{city}', CityComponent::class)->name('admin.cities.show');
Route::get('users', UserComponent::class)->name('admin.users.index');
Route::get('plans',ShowPlans::class)->name('admin.plans');
Route::get('plans/{plan}/edit', EditPlan::class)->name('admin.plans.edit');

Route::get('/blog', [BlogController::class, 'index'])->name('admin.blog.index');
Route::resource('/posts', PostController::class)->names('admin.posts');
Route::get('/post/categories', PostCategory::class)->name('admin.postcategories');


Route::post('uploadimage', [PostController::class, 'uploadImage'])->name('admin.posts.upload');
Route::post('images/upload', [PostController::class, 'uploadImages'])->name('ckeditor.upload');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
