<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerStatusController;
use App\Http\Controllers\CustomerDiscountController;
use App\Http\Controllers\PriceListController;
use App\Models\PriceList;
use App\Models\PriceListData;
use App\Models\customer;
use App\Models\ClubBalance;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ClubBalanceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('mainpage');
});

Route::get('/neworder', [OrdersController::class, 'ordersShow'])->name('neworder1');
Route::post('/neworder', [OrdersController::class, 'ordersShow'])->name('neworder');
Route::post('/add_order', [OrdersController::class, 'addOrder']);
Route::get('/add_order', [OrdersController::class, 'addOrder']);

Route::get('/edit_order', [OrdersController::class, 'editOrder']);
Route::post('/edit_order', [OrdersController::class, 'editOrder']);
Route::post('/delete_order', [OrdersController::class, 'deleteOrder']);
Route::post('/add_detail', [OrdersController::class, 'addDetail']);
Route::post('/edit_detail', [OrdersController::class, 'editDetail']);
Route::post('/delete_detail', [OrdersController::class, 'deleteDetail']);
Route::post('/up_shipdate', [OrdersController::class, 'up_shipdate']);
Route::post('/up_paiddate', [OrdersController::class, 'up_paiddate']);
Route::post('/up_genadate', [OrdersController::class, 'up_genadate']);
Route::post('/change_period', [OrdersController::class, 'changePeriod']);

Route::post('/libraries', function () {
    return view('libraries');
})->name('libraries');
Route::get('/libraries', function () {
    return view('libraries');
});

Route::get('/libraries/customers', [CustomerController::class, 'showAll'])->name('customers');
Route::get('/libraries/customer_statuses', [CustomerStatusController::class, 'showAll'])->name('customer_statuses');
Route::get('/libraries/customer_discounts', [CustomerDiscountController::class, 'showAll'])->name('customer_discounts');



Route::get('/libraries/pricelists', function () {
    return view('pricelists');
})->name('pricelists');

Route::post('/customer/new', function () {
    return view('customer_form', [
        'customerStatuses' => \App\Models\CustomerStatus::all(),
        'customerDiscounts' => \App\Models\CustomerDiscount::all(),
    ]);
})->name('customer_new');
Route::post('/customer/add', [CustomerController::class, 'add'])->name('customer_add');
Route::post('/customer/update', [CustomerController::class, 'update'])->name('customer_update');
Route::post('/customer/delete', [CustomerController::class, 'delete'])->name('customer_delete');
Route::post('/customer/edit', function () {
    /*dump(request()->id);
    dd(\App\Models\customer::where('id', '=', request()->id)->get());*/
    return view('customer_edit', [
        'customerStatuses' => \App\Models\CustomerStatus::all(),
        'customerDiscounts' => \App\Models\CustomerDiscount::all(),
        'customer' => \App\Models\customer::where('id', '=', request()->id)->first(),
        'id' => request()->id,
    ]);
})->name('customer_edit');


Route::post('/customer/status/new', function () {
    return view('customer_status_form');
})->name('customer_status_new');
Route::post('/customer/status/add', [CustomerStatusController::class, 'add'])->name('customer_status_add');
Route::post('/customer/status/delete', [CustomerStatusController::class, 'delete'])->name('customer_status_delete');

Route::post('/customer/discount/new', function () {
    return view('customer_discount_form');
})->name('customer_discount_new');
Route::post('/customer/discount/add', [CustomerDiscountController::class, 'add'])->name('customer_discount_add');
Route::post('/customer/discount/delete', [CustomerDiscountController::class, 'delete'])->name('customer_discount_delete');

// Создание, изменение и удаление прайс-листов целиком
Route::get('/libraries/pricelists', [PriceListController::class, 'showPriceLists']);
Route::post('/pricelist/new', [PriceListController::class, 'createPriceList'])->name('pricelist_new');
Route::post('/pricelist/delete', [PriceListController::class, 'deletePriceList'])->name('pricelist_delete');
Route::post('/pricelist/edit', [PriceListController::class, 'editPriceList'])->name('pricelist_edit');

// Редактирование и удаление данных в конкретных прайс-листах
Route::post('/pricelistdata/newitem', [PriceListController::class, 'newPriceListItem'])->name('pricelistdata_new');
Route::post('/pricelistdata/deleteitem', [PriceListController::class, 'deletePriceListItem'])->name('pricelistdata_delete');
Route::post('/pricelistdata/updateitem', [PriceListController::class, 'updatePriceListItem'])->name('pricelistdata_update');
Route::post('/pricelistdata/saveitem', [PriceListController::class, 'savePriceListItem'])->name('pricelistdata_save');

// Отчеты
Route::post('/reportslist', function () {
    return view('reportslist');
});
Route::get('/reportslist', function () {
    return view('reportslist');
});
Route::get('/reports/warebill', [ReportsController::class, 'warebillSet']);
Route::post('/reports/warebill', [ReportsController::class, 'warebillSet']);
Route::get('/reports/warebill_customer', [ReportsController::class, 'warebillSetCustomer']);
Route::post('/reports/warebill_customer', [ReportsController::class, 'warebillSetCustomer']);
Route::post('/reports/getwarebill', [ReportsController::class, 'getWarebill']);
Route::post('/reports/getwarebill_customer', [ReportsController::class, 'getWarebillCustomer']);
Route::post('/reports/selectorder', [ReportsController::class, 'selectOrder']);
Route::get('/reports/selectorder', [ReportsController::class, 'selectOrder']);
Route::post('/reports/selectorder_customer', [ReportsController::class, 'selectOrderCustomer']);
Route::get('/reports/selectorder_customer', [ReportsController::class, 'selectOrderCustomer']);
Route::get('/reports/warebill_pdf', [PdfController::class, 'warebillPdf']);
Route::post('/reports/warebill_pdf', [PdfController::class, 'warebillPdf']);


// Списания в клубе
Route::post('/balance', function () {
    return view('balancepage', [
        'customers' => customer::all(),
        'balanceItems' => ClubBalance::orderBy('idз', 'desc')->get(),
    ]);
});
Route::post('/balance/addOperation', [ClubBalanceController::class, 'addOperation']);
Route::post('/balance/delete', [ClubBalanceController::class, 'deleteOperation']);
Route::get('/clearbalance', function () {
    ClubBalance::truncate();
});

