<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::prefix("admin")->namespace("App\Http\Controllers\Admin")->group(function (){

    Route::get("/" , "AdminDashboardController@index")->name("admin.home");

    Route::prefix("market")->namespace("Market")->group(function (){

        // category
        Route::prefix("category")->group(function (){
            Route::get("/" , "CategoryController@index")->name("admin.market.category.index");
            Route::get("/create" , "CategoryController@create")->name("admin.market.category.create");
            Route::post("/store" , "CategoryController@store")->name("admin.market.category.store");
            Route::get("/edit/{id}" , "CategoryController@edit")->name("admin.market.category.edit");
            Route::put("/update/{id}" , "CategoryController@update")->name("admin.market.category.update");
            Route::delete("/destroy/{id}" , "CategoryController@destroy")->name("admin.market.category.destroy");
        });

        // brand
        Route::prefix("brand")->group(function (){
            Route::get("/" , "BrandController@index")->name("admin.market.brand.index");
            Route::get("/create" , "BrandController@create")->name("admin.market.brand.create");
            Route::post("/store" , "BrandController@store")->name("admin.market.brand.store");
            Route::get("/edit/{id}" , "BrandController@edit")->name("admin.market.brand.edit");
            Route::put("/update/{id}" , "BrandController@update")->name("admin.market.brand.update");
            Route::delete("/destroy/{id}" , "BrandController@destroy")->name("admin.market.brand.destroy");
        });

        // comment
        Route::prefix("comment")->group(function (){
            Route::get("/" , "CommentController@index")->name("admin.market.comment.index");
            Route::get("/show" , "CommentController@show")->name("admin.market.comment.show");
            Route::post("/store" , "CommentController@store")->name("admin.market.comment.store");
            Route::get("/edit/{id}" , "CommentController@edit")->name("admin.market.comment.edit");
            Route::put("/update/{id}" , "CommentController@update")->name("admin.market.comment.update");
            Route::delete("/destroy/{id}" , "CommentController@destroy")->name("admin.market.comment.destroy");
        });

        // delivery
        Route::prefix("delivery")->group(function (){
            Route::get("/" , "DeliveryController@index")->name("admin.market.delivery.index");
            Route::get("/create" , "DeliveryController@create")->name("admin.market.delivery.create");
            Route::post("/store" , "DeliveryController@store")->name("admin.market.delivery.store");
            Route::get("/edit/{id}" , "DeliveryController@edit")->name("admin.market.delivery.edit");
            Route::put("/update/{id}" , "DeliveryController@update")->name("admin.market.delivery.update");
            Route::delete("/destroy/{id}" , "DeliveryController@destroy")->name("admin.market.delivery.destroy");
        });

        // discount
        Route::prefix("discount")->group(function (){
            Route::get("/copan" , "DiscountController@copan")->name("admin.market.discount.copan");
            Route::get("/copan/create" , "DiscountController@copanCreate")->name("admin.market.discount.copan.create");

            Route::get("/common-discount" , "DiscountController@commonDiscount")->name("admin.market.discount.commonDiscount");
            Route::get("/common-discount/create" , "DiscountController@commonDiscountCreate")->name("admin.market.discount.commonDiscount.create");

            Route::get("/amazing-sale" , "DiscountController@amazingSale")->name("admin.market.discount.amazingSale");
            Route::get("/amazing-sale/create" , "DiscountController@amazingSaleCreate")->name("admin.market.discount.amazingSale.create");
        });

        // order
        Route::prefix("order")->group(function (){
            Route::get("/" , "OrderController@all")->name("admin.market.order.all");
            Route::get("/new-order" , "OrderController@newOrder")->name("admin.market.order.newOrder");
            Route::get("/sending" , "OrderController@sending")->name("admin.market.order.sending");
            Route::get("/unpaid" , "OrderController@unpaid")->name("admin.market.order.unpaid");
            Route::get("/canceled" , "OrderController@canceled")->name("admin.market.order.canceled");
            Route::get("/returned" , "OrderController@returned")->name("admin.market.order.returned");
            Route::get("/show" , "OrderController@show")->name("admin.market.order.show");
            Route::get("/change-send-status" , "OrderController@changeSendStatus")->name("admin.market.order.changeSendStatus");
            Route::get("/change-order-status" , "OrderController@changeOrderStatus")->name("admin.market.order.changeOrderStatus");
            Route::get("/cancel-order" , "OrderController@cancelOrder")->name("admin.market.order.cancelOrder");
        });

        // payment
        Route::prefix("payment")->group(function (){
            Route::get("/" , "PaymentController@index")->name("admin.market.payment.index");
            Route::get("/online" , "PaymentController@online")->name("admin.market.payment.online");
            Route::get("/offline" , "PaymentController@offline")->name("admin.market.payment.offline");
            Route::get("/attendance" , "PaymentController@attendance")->name("admin.market.payment.attendance");
            Route::get("/confirm" , "PaymentController@confirm")->name("admin.market.payment.confirm");
        });

        // product
        Route::prefix("product")->group(function (){
            Route::get("/" , "ProductController@index")->name("admin.market.product.index");
            Route::get("/create" , "ProductController@create")->name("admin.market.product.create");
            Route::post("/store" , "ProductController@store")->name("admin.market.product.store");
            Route::get("/edit/{id}" , "ProductController@edit")->name("admin.market.product.edit");
            Route::put("/update/{id}" , "ProductController@update")->name("admin.market.product.update");
            Route::delete("/destroy/{id}" , "ProductController@destroy")->name("admin.market.product.destroy");

            Route::get("/gallery" , "GalleryController@index")->name("admin.market.gallery.index");
            Route::post("/gallery/store" , "GalleryController@store")->name("admin.market.gallery.store");
            Route::delete("/gallery/destroy/{id}" , "GalleryController@destroy")->name("admin.market.gallery.destroy");
        });

        // property
        Route::prefix("property")->group(function (){
            Route::get("/" , "PropertyController@index")->name("admin.market.property.index");
            Route::get("/create" , "PropertyController@create")->name("admin.market.property.create");
            Route::post("/store" , "PropertyController@store")->name("admin.market.property.store");
            Route::get("/edit/{id}" , "PropertyController@edit")->name("admin.market.property.edit");
            Route::put("/update/{id}" , "PropertyController@update")->name("admin.market.property.update");
            Route::delete("/destroy/{id}" , "PropertyController@destroy")->name("admin.market.property.destroy");
        });

        // store
        Route::prefix("store")->group(function (){
            Route::get("/" , "StoreController@index")->name("admin.market.store.index");
            Route::get("/add-to-store" , "StoreController@addToStore")->name("admin.market.store.addToStore");
            Route::post("/store" , "StoreController@store")->name("admin.market.store.store");
            Route::get("/edit/{id}" , "StoreController@edit")->name("admin.market.store.edit");
            Route::put("/update/{id}" , "StoreController@update")->name("admin.market.store.update");
            Route::delete("/destroy/{id}" , "StoreController@destroy")->name("admin.market.store.destroy");
        });

    });




    Route::prefix("content")->namespace("Content")->group(function (){

        // category
        Route::prefix("category")->group(function (){
            Route::get("/" , "CategoryController@index")->name("admin.content.category.index");
            Route::get("/create" , "CategoryController@create")->name("admin.content.category.create");
            Route::post("/store" , "CategoryController@store")->name("admin.content.category.store");
            Route::get("/edit/{postCategory}" , "CategoryController@edit")->name("admin.content.category.edit");
            Route::put("/update/{postCategory}" , "CategoryController@update")->name("admin.content.category.update");
            Route::delete("/destroy/{postCategory}" , "CategoryController@destroy")->name("admin.content.category.destroy");
            Route::get("/status/{postCategory}" , "CategoryController@status")->name("admin.content.category.status");
        });

        // comment
        Route::prefix("comment")->group(function (){
            Route::get("/" , "CommentController@index")->name("admin.content.comment.index");
            Route::get("/show/{comment}" , "CommentController@show")->name("admin.content.comment.show");
            Route::delete("/destroy/{comment}" , "CommentController@destroy")->name("admin.content.comment.destroy");
            Route::get("/status/{comment}" , "CommentController@approved")->name("admin.content.comment.approved");
            Route::get("/approved/{comment}" , "CommentController@status")->name("admin.content.comment.status");
            Route::post("/answer/{comment}" , "CommentController@answer")->name("admin.content.comment.answer");

        });

        // FAQ
        Route::prefix("faq")->group(function (){
            Route::get("/" , "FAQController@index")->name("admin.content.faq.index");
            Route::get("/create" , "FAQController@create")->name("admin.content.faq.create");
            Route::post("/store" , "FAQController@store")->name("admin.content.faq.store");
            Route::get("/edit/{faq}" , "FAQController@edit")->name("admin.content.faq.edit");
            Route::put("/update/{faq}" , "FAQController@update")->name("admin.content.faq.update");
            Route::delete("/destroy/{faq}" , "FAQController@destroy")->name("admin.content.faq.destroy");
            Route::get("/status/{faq}" , "FAQController@status")->name("admin.content.faq.status");
        });

        // menu
        Route::prefix("menu")->group(function (){
            Route::get("/" , "MenuController@index")->name("admin.content.menu.index");
            Route::get("/create" , "MenuController@create")->name("admin.content.menu.create");
            Route::post("/store" , "MenuController@store")->name("admin.content.menu.store");
            Route::get("/edit/{menu}" , "MenuController@edit")->name("admin.content.menu.edit");
            Route::put("/update/{menu}" , "MenuController@update")->name("admin.content.menu.update");
            Route::delete("/destroy/{menu}" , "MenuController@destroy")->name("admin.content.menu.destroy");
            Route::get("/status/{menu}" , "MenuController@status")->name("admin.content.menu.status");
        });

        // page
        Route::prefix("page")->group(function (){
            Route::get("/" , "PageController@index")->name("admin.content.page.index");
            Route::get("/create" , "PageController@create")->name("admin.content.page.create");
            Route::post("/store" , "PageController@store")->name("admin.content.page.store");
            Route::get("/edit/{page}" , "PageController@edit")->name("admin.content.page.edit");
            Route::put("/update/{page}" , "PageController@update")->name("admin.content.page.update");
            Route::delete("/destroy/{page}" , "PageController@destroy")->name("admin.content.page.destroy");
            Route::get("/status/{page}" , "PageController@status")->name("admin.content.page.status");
        });

        // post
        Route::prefix("post")->group(function (){
            Route::get("/" , "PostController@index")->name("admin.content.post.index");
            Route::get("/create" , "PostController@create")->name("admin.content.post.create");
            Route::post("/store" , "PostController@store")->name("admin.content.post.store");
            Route::get("/edit/{post}" , "PostController@edit")->name("admin.content.post.edit");
            Route::put("/update/{post}" , "PostController@update")->name("admin.content.post.update");
            Route::delete("/destroy/{post}" , "PostController@destroy")->name("admin.content.post.destroy");
            Route::get("/status/{post}" , "PostController@status")->name("admin.content.post.status");
            Route::get("/commentable/{post}" , "PostController@commentable")->name("admin.content.post.commentable");
        });

    });




    Route::prefix("user")->namespace("User")->group(function (){

        // admin user
        Route::prefix("adminUser")->group(function (){
            Route::get("/" , "AdminUserController@index")->name("admin.user.adminUser.index");
            Route::get("/create" , "AdminUserController@create")->name("admin.user.adminUser.create");
            Route::post("/store" , "AdminUserController@store")->name("admin.user.adminUser.store");
            Route::get("/edit/{user}" , "AdminUserController@edit")->name("admin.user.adminUser.edit");
            Route::put("/update/{user}" , "AdminUserController@update")->name("admin.user.adminUser.update");
            Route::delete("/destroy/{user}" , "AdminUserController@destroy")->name("admin.user.adminUser.destroy");
            Route::get("/status/{user}" , "AdminUserController@status")->name("admin.user.adminUser.status");
        });

        // customer
        Route::prefix("customer")->group(function (){
            Route::get("/" , "CustomerController@index")->name("admin.user.customer.index");
            Route::get("/create" , "CustomerController@create")->name("admin.user.customer.create");
            Route::post("/store" , "CustomerController@store")->name("admin.user.customer.store");
            Route::get("/edit/{user}" , "CustomerController@edit")->name("admin.user.customer.edit");
            Route::put("/update/{user}" , "CustomerController@update")->name("admin.user.customer.update");
            Route::delete("/destroy/{user}" , "CustomerController@destroy")->name("admin.user.customer.destroy");
            Route::get("/status/{user}" , "CustomerController@status")->name("admin.user.customer.status");
        });

        // role
        Route::prefix("role")->group(function (){
            Route::get("/" , "RoleController@index")->name("admin.user.role.index");
            Route::get("/create" , "RoleController@create")->name("admin.user.role.create");
            Route::post("/store" , "RoleController@store")->name("admin.user.role.store");
            Route::get("/edit/{id}" , "RoleController@edit")->name("admin.user.role.edit");
            Route::put("/update/{id}" , "RoleController@update")->name("admin.user.role.update");
            Route::delete("/destroy/{id}" , "RoleController@destroy")->name("admin.user.role.destroy");
        });

        // permission
        Route::prefix("permission")->group(function (){
            Route::get("/" , "PermissionController@index")->name("admin.user.permission.index");
            Route::get("/create" , "PermissionController@create")->name("admin.user.permission.create");
            Route::post("/store" , "PermissionController@store")->name("admin.user.permission.store");
            Route::get("/edit/{id}" , "PermissionController@edit")->name("admin.user.permission.edit");
            Route::put("/update/{id}" , "PermissionController@update")->name("admin.user.permission.update");
            Route::delete("/destroy/{id}" , "PermissionController@destroy")->name("admin.user.permission.destroy");
        });


    });




    Route::prefix("notify")->namespace("Notify")->group(function (){

        // email
        Route::prefix("email")->group(function (){
            Route::get("/" , "EmailController@index")->name("admin.notify.email.index");
            Route::get("/create" , "EmailController@create")->name("admin.notify.email.create");
            Route::post("/store" , "EmailController@store")->name("admin.notify.email.store");
            Route::get("/edit/{email}" , "EmailController@edit")->name("admin.notify.email.edit");
            Route::put("/update/{email}" , "EmailController@update")->name("admin.notify.email.update");
            Route::delete("/destroy/{email}" , "EmailController@destroy")->name("admin.notify.email.destroy");
            Route::get("/status/{email}" , "EmailController@status")->name("admin.notify.email.status");
        });

        // email file
        Route::prefix("email-file")->group(function (){
            Route::get("/{email}" , "EmailFileController@index")->name("admin.notify.emailFile.index");
            Route::get("/{email}/create" , "EmailFileController@create")->name("admin.notify.emailFile.create");
            Route::post("/{email}/store" , "EmailFileController@store")->name("admin.notify.emailFile.store");
            Route::get("/edit/{file}" , "EmailFileController@edit")->name("admin.notify.emailFile.edit");
            Route::put("/update/{file}" , "EmailFileController@update")->name("admin.notify.emailFile.update");
            Route::delete("/destroy/{file}" , "EmailFileController@destroy")->name("admin.notify.emailFile.destroy");
            Route::get("/status/{file}" , "EmailFileController@status")->name("admin.notify.emailFile.status");
        });

        // sms
        Route::prefix("sms")->group(function (){
            Route::get("/" , "SMSController@index")->name("admin.notify.sms.index");
            Route::get("/create" , "SMSController@create")->name("admin.notify.sms.create");
            Route::post("/store" , "SMSController@store")->name("admin.notify.sms.store");
            Route::get("/edit/{sms}" , "SMSController@edit")->name("admin.notify.sms.edit");
            Route::put("/update/{sms}" , "SMSController@update")->name("admin.notify.sms.update");
            Route::delete("/destroy/{sms}" , "SMSController@destroy")->name("admin.notify.sms.destroy");
            Route::get("/status/{sms}" , "SMSController@status")->name("admin.notify.sms.status");
        });

    });




    Route::prefix("ticket")->namespace("Ticket")->group(function (){

        // ticket
        Route::get("/new-tickets" , "TicketController@newTickets")->name("admin.ticket.newTickets");
        Route::get("/open-tickets" , "TicketController@openTickets")->name("admin.ticket.openTickets");
        Route::get("/close-tickets" , "TicketController@closeTickets")->name("admin.ticket.closeTickets");
        Route::get("/show" , "TicketController@show")->name("admin.ticket.show");
        Route::post("/store" , "TicketController@store")->name("admin.ticket.store");
        Route::get("/edit/{id}" , "TicketController@edit")->name("admin.ticket.edit");
        Route::put("/update/{id}" , "TicketController@update")->name("admin.ticket.update");
        Route::delete("/destroy/{id}" , "TicketController@destroy")->name("admin.ticket.destroy");

    });




    Route::prefix("setting")->namespace("Setting")->group(function (){

        // setting
        Route::get("/" , "SettingController@index")->name("admin.setting.index");
        Route::get("/edit/{setting}" , "SettingController@edit")->name("admin.setting.edit");
        Route::put("/update/{setting}" , "SettingController@update")->name("admin.setting.update");
        Route::delete("/destroy/{setting}" , "SettingController@destroy")->name("admin.setting.destroy");

    });

});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
