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
            Route::get("/" , "CategoryController@index")->can("access-orders-important")->name("admin.market.category.index");
            Route::get("/create" , "CategoryController@create")->can("access-orders-important")->name("admin.market.category.create");
            Route::post("/store" , "CategoryController@store")->can("access-orders-important")->name("admin.market.category.store");
            Route::get("/edit/{productCategory}" , "CategoryController@edit")->can("access-orders-important")->name("admin.market.category.edit");
            Route::put("/update/{productCategory}" , "CategoryController@update")->can("access-orders-important")->name("admin.market.category.update");
            Route::delete("/destroy/{productCategory}" , "CategoryController@destroy")->can("access-orders-important")->name("admin.market.category.destroy");
            Route::get("/status/{productCategory}" , "CategoryController@status")->can("access-orders-important")->name("admin.market.category.status");
        });

        // brand
        Route::prefix("brand")->group(function (){
            Route::get("/" , "BrandController@index")->can("access-orders-important")->name("admin.market.brand.index");
            Route::get("/create" , "BrandController@create")->can("access-orders-important")->name("admin.market.brand.create");
            Route::post("/store" , "BrandController@store")->can("access-orders-important")->name("admin.market.brand.store");
            Route::get("/edit/{brand}" , "BrandController@edit")->can("access-orders-important")->name("admin.market.brand.edit");
            Route::put("/update/{brand}" , "BrandController@update")->can("access-orders-important")->name("admin.market.brand.update");
            Route::delete("/destroy/{brand}" , "BrandController@destroy")->can("access-orders-important")->name("admin.market.brand.destroy");
            Route::get("/status/{brand}" , "BrandController@status")->can("access-orders-important")->name("admin.market.brand.status");
        });

        // comment
        Route::prefix("comment")->group(function (){
            Route::get("/" , "CommentController@index")->can("access-orders-important")->name("admin.market.comment.index");
            Route::get("/show/{comment}" , "CommentController@show")->can("access-orders-important")->name("admin.market.comment.show");
            Route::delete("/destroy/{comment}" , "CommentController@destroy")->can("access-orders-important")->name("admin.market.comment.destroy");
            Route::get("/approved/{comment}" , "CommentController@approved")->can("access-orders-important")->name("admin.market.comment.approved");
            Route::get("/status/{comment}" , "CommentController@status")->can("access-orders-important")->name("admin.market.comment.status");
            Route::post("/answer/{comment}" , "CommentController@answer")->can("access-orders-important")->name("admin.market.comment.answer");
        });

        // delivery
        Route::prefix("delivery")->group(function (){
            Route::get("/" , "DeliveryController@index")->can("access-orders-important")->name("admin.market.delivery.index");
            Route::get("/create" , "DeliveryController@create")->can("access-orders-important")->name("admin.market.delivery.create");
            Route::post("/store" , "DeliveryController@store")->can("access-orders-important")->name("admin.market.delivery.store");
            Route::get("/edit/{delivery}" , "DeliveryController@edit")->can("access-orders-important")->name("admin.market.delivery.edit");
            Route::put("/update/{delivery}" , "DeliveryController@update")->can("access-orders-important")->name("admin.market.delivery.update");
            Route::delete("/destroy/{delivery}" , "DeliveryController@destroy")->can("access-orders-important")->name("admin.market.delivery.destroy");
            Route::get("/status/{delivery}", "DeliveryController@status")->can("access-orders-important")->name("admin.market.delivery.status");
        });

        // discount
        Route::prefix("discount")->group(function (){
            Route::get("/copan" , "DiscountController@copan")->can("access-discounts")->name("admin.market.discount.copan");
            Route::get("/copan/create" , "DiscountController@copanCreate")->can("access-discounts")->name("admin.market.discount.copan.create");;
            Route::post("/copan/store" , "DiscountController@copanStore")->can("access-discounts")->name("admin.market.discount.copan.store");
            Route::get("/copan/edit/{copan}" , "DiscountController@copanEdit")->can("access-discounts")->name("admin.market.discount.copan.edit");
            Route::put("/copan/update/{copan}" , "DiscountController@copanUpdate")->can("access-discounts")->name("admin.market.discount.copan.update");
            Route::delete("/copan/destroy/{copan}" , "DiscountController@copanDestroy")->can("access-discounts")->name("admin.market.discount.copan.destroy");
            Route::get("/copan/status/{copan}" , "DiscountController@copanStatus")->can("access-discounts")->name("admin.market.discount.copan.status");
            Route::get("/copan/getUsers" , "DiscountController@copanGetUsers")->can("access-discounts")->name("admin.market.discount.copan.getUsers");

            Route::get("/common-discount" , "DiscountController@commonDiscount")->can("access-discounts")->name("admin.market.discount.commonDiscount");
            Route::get("/common-discount/create" , "DiscountController@commonDiscountCreate")->can("access-discounts")->name("admin.market.discount.commonDiscount.create");
            Route::post("/common-discount/store" , "DiscountController@commonDiscountStore")->can("access-discounts")->name("admin.market.discount.commonDiscount.store");
            Route::get("/common-discount/edit/{commonDiscount}" , "DiscountController@commonDiscountEdit")->can("access-discounts")->name("admin.market.discount.commonDiscount.edit");
            Route::put("/common-discount/update/{commonDiscount}" , "DiscountController@commonDiscountUpdate")->can("access-discounts")->name("admin.market.discount.commonDiscount.update");
            Route::delete("/common-discount/destroy/{commonDiscount}" , "DiscountController@commonDiscountDestroy")->can("access-discounts")->name("admin.market.discount.commonDiscount.destroy");
            Route::get("/common-discount/status/{commonDiscount}" , "DiscountController@commonDiscountStatus")->can("access-discounts")->name("admin.market.discount.commonDiscount.status");

            Route::get("/amazing-sale" , "DiscountController@amazingSale")->can("access-discounts")->name("admin.market.discount.amazingSale");
            Route::get("/amazing-sale/create" , "DiscountController@amazingSaleCreate")->can("access-discounts")->name("admin.market.discount.amazingSale.create");
            Route::post("/amazing-sale/store" , "DiscountController@amazingSaleStore")->can("access-discounts")->name("admin.market.discount.amazingSale.store");
            Route::get("/amazing-sale/edit/{amazingSale}" , "DiscountController@amazingSaleEdit")->can("access-discounts")->name("admin.market.discount.amazingSale.edit");
            Route::put("/amazing-sale/update/{amazingSale}" , "DiscountController@amazingSaleUpdate")->can("access-discounts")->name("admin.market.discount.amazingSale.update");
            Route::delete("/amazing-sale/destroy/{amazingSale}" , "DiscountController@amazingSaleDestroy")->can("access-discounts")->name("admin.market.discount.amazingSale.destroy");
            Route::get("/amazing-sale/status/{amazingSale}" , "DiscountController@amazingSaleStatus")->can("access-discounts")->name("admin.market.discount.amazingSale.status");
        });

        // order
        Route::prefix("order")->group(function (){
            Route::get("/" , "OrderController@all")->can("access-orders")->name("admin.market.order.all");
            Route::get("/new-order" , "OrderController@newOrder")->can("access-orders")->name("admin.market.order.newOrder");
            Route::get("/sending" , "OrderController@sending")->can("access-orders")->name("admin.market.order.sending");
            Route::get("/unpaid" , "OrderController@unpaid")->can("access-orders")->name("admin.market.order.unpaid");
            Route::get("/canceled" , "OrderController@canceled")->can("access-orders")->name("admin.market.order.canceled");
            Route::get("/returned" , "OrderController@returned")->can("access-orders")->name("admin.market.order.returned");
            Route::get("/show/{order}" , "OrderController@show")->can("access-orders")->name("admin.market.order.show");
            Route::get("/show/{order}/detail" , "OrderController@detail")->can("access-orders")->name("admin.market.order.detail");
            Route::get("/change-send-status/{order}" , "OrderController@changeSendStatus")->can("access-orders")->name("admin.market.order.changeSendStatus");
            Route::get("/change-order-status/{order}" , "OrderController@changeOrderStatus")->can("access-orders")->name("admin.market.order.changeOrderStatus");
            Route::get("/cancel-order/{order}" , "OrderController@cancelOrder")->can("access-orders")->name("admin.market.order.cancelOrder");
        });

        // payment
        Route::prefix("payment")->group(function (){
            Route::get("/" , "PaymentController@index")->can("access-payments")->name("admin.market.payment.index");
            Route::get("/online" , "PaymentController@online")->can("access-payments")->name("admin.market.payment.online");
            Route::get("/offline" , "PaymentController@offline")->can("access-payments")->name("admin.market.payment.offline");
            Route::get("/cash" , "PaymentController@cash")->can("access-payments")->name("admin.market.payment.cash");
            Route::get("/show/{payment}" , "PaymentController@show")->can("access-payments")->name("admin.market.payment.show");
            Route::get("/confirm/{payment}" , "PaymentController@confirm")->can("access-payments")->name("admin.market.payment.confirm");
            Route::get("/canceled/{payment}" , "PaymentController@canceled")->can("access-payments")->name("admin.market.payment.canceled");
            Route::get("/returned/{payment}" , "PaymentController@returned")->can("access-payments")->name("admin.market.payment.returned");
        });

        // product
        Route::prefix("product")->group(function (){
            Route::get("/" , "ProductController@index")->can("access-orders-important")->name("admin.market.product.index");
            Route::get("/create" , "ProductController@create")->can("access-orders-important")->name("admin.market.product.create");
            Route::post("/store" , "ProductController@store")->can("access-orders-important")->name("admin.market.product.store");
            Route::get("/edit/{product}" , "ProductController@edit")->can("access-orders-important")->name("admin.market.product.edit");
            Route::put("/update/{product}" , "ProductController@update")->can("access-orders-important")->name("admin.market.product.update");
            Route::delete("/destroy/{product}" , "ProductController@destroy")->can("access-orders-important")->name("admin.market.product.destroy");
            Route::get("/status/{product}" , "ProductController@status")->can("access-orders-important")->name("admin.market.product.status");
            // gallery
            Route::get("/gallery/{product}" , "GalleryController@index")->can("access-orders-important")->name("admin.market.gallery.index");
            Route::get("/gallery/{product}/create" , "GalleryController@create")->can("access-orders-important")->name("admin.market.gallery.create");
            Route::post("/gallery/{product}/store" , "GalleryController@store")->can("access-orders-important")->name("admin.market.gallery.store");
            Route::delete("/gallery/destroy/{product}/{gallery}" , "GalleryController@destroy")->can("access-orders-important")->name("admin.market.gallery.destroy");
            // color
            Route::get("/color/{product}" , "ProductColorController@index")->can("access-orders-important")->name("admin.market.color.index");
            Route::get("/color/{product}/create" , "ProductColorController@create")->can("access-orders-important")->name("admin.market.color.create");
            Route::post("/color/{product}/store" , "ProductColorController@store")->can("access-orders-important")->name("admin.market.color.store");
            Route::delete("/color/destroy/{product}/{color}" , "ProductColorController@destroy")->can("access-orders-important")->name("admin.market.color.destroy");
            // guarantee
            Route::get("/guarantee/{product}" , "ProductGuaranteeController@index")->can("access-orders-important")->name("admin.market.guarantee.index");
            Route::get("/guarantee/{product}/create" , "ProductGuaranteeController@create")->can("access-orders-important")->name("admin.market.guarantee.create");
            Route::post("/guarantee/{product}/store" , "ProductGuaranteeController@store")->can("access-orders-important")->name("admin.market.guarantee.store");
            Route::delete("/guarantee/destroy/{product}/{guarantee}" , "ProductGuaranteeController@destroy")->can("access-orders-important")->name("admin.market.guarantee.destroy");
        });

        // property
        Route::prefix("property")->group(function (){
            Route::get("/" , "PropertyController@index")->can("access-orders-important")->name("admin.market.property.index");
            Route::get("/create" , "PropertyController@create")->can("access-orders-important")->name("admin.market.property.create");
            Route::post("/store" , "PropertyController@store")->can("access-orders-important")->name("admin.market.property.store");
            Route::get("/edit/{categoryAttribute}" , "PropertyController@edit")->can("access-orders-important")->name("admin.market.property.edit");
            Route::put("/update/{categoryAttribute}" , "PropertyController@update")->can("access-orders-important")->name("admin.market.property.update");
            Route::delete("/destroy/{categoryAttribute}" , "PropertyController@destroy")->can("access-orders-important")->name("admin.market.property.destroy");
            // value
            Route::get("/value/{categoryAttribute}" , "PropertyValueController@index")->can("access-orders-important")->name("admin.market.property.value.index");
            Route::get("/value/{categoryAttribute}/create" , "PropertyValueController@create")->can("access-orders-important")->name("admin.market.property.value.create");
            Route::post("/value/{categoryAttribute}/store" , "PropertyValueController@store")->can("access-orders-important")->name("admin.market.property.value.store");
            Route::get("/value/edit/{categoryAttribute}/{value}" , "PropertyValueController@edit")->can("access-orders-important")->name("admin.market.property.value.edit");
            Route::put("/value/update/{categoryAttribute}/{value}" , "PropertyValueController@update")->can("access-orders-important")->name("admin.market.property.value.update");
            Route::delete("/value/destroy/{categoryAttribute}/{value}" , "PropertyValueController@destroy")->can("access-orders-important")->name("admin.market.property.value.destroy");
        });

        // store
        Route::prefix("store")->group(function (){
            Route::get("/" , "StoreController@index")->can("access-orders-important")->name("admin.market.store.index");
            Route::get("/add-to-store/{product}" , "StoreController@addToStore")->can("access-orders-important")->name("admin.market.store.addToStore");
            Route::post("/store/{product}" , "StoreController@store")->can("access-orders-important")->name("admin.market.store.store");
            Route::get("/edit/{product}" , "StoreController@edit")->can("access-orders-important")->name("admin.market.store.edit");
            Route::put("/update/{product}" , "StoreController@update")->can("access-orders-important")->name("admin.market.store.update");
        });

    });




    Route::prefix("content")->namespace("Content")->group(function (){

        // category
        Route::prefix("category")->group(function (){
            Route::get("/" , "CategoryController@index")->can("show-content")->name("admin.content.category.index");
            Route::get("/create" , "CategoryController@create")->can("show-content")->name("admin.content.category.create");
            Route::post("/store" , "CategoryController@store")->can("show-content")->name("admin.content.category.store");
            Route::get("/edit/{postCategory}" , "CategoryController@edit")->can("show-content")->name("admin.content.category.edit");
            Route::put("/update/{postCategory}" , "CategoryController@update")->can("show-content")->name("admin.content.category.update");
            Route::delete("/destroy/{postCategory}" , "CategoryController@destroy")->can("show-content")->name("admin.content.category.destroy");
            Route::get("/status/{postCategory}" , "CategoryController@status")->can("show-content")->name("admin.content.category.status");
        });

        // comment
        Route::prefix("comment")->group(function (){
            Route::get("/" , "CommentController@index")->can("show-content-comment")->name("admin.content.comment.index");
            Route::get("/show/{comment}" , "CommentController@show")->can("show-content-comment")->name("admin.content.comment.show");
            Route::delete("/destroy/{comment}" , "CommentController@destroy")->can("show-content-comment")->name("admin.content.comment.destroy");
            Route::get("/approved/{comment}" , "CommentController@approved")->can("show-content-comment")->name("admin.content.comment.approved");
            Route::get("/status/{comment}" , "CommentController@status")->can("show-content-comment")->name("admin.content.comment.status");
            Route::post("/answer/{comment}" , "CommentController@answer")->can("show-content-comment")->name("admin.content.comment.answer");
        });

        // FAQ
        Route::prefix("faq")->group(function (){
            Route::get("/" , "FAQController@index")->can("show-faq")->name("admin.content.faq.index");
            Route::get("/create" , "FAQController@create")->can("show-faq")->name("admin.content.faq.create");
            Route::post("/store" , "FAQController@store")->can("show-faq")->name("admin.content.faq.store");
            Route::get("/edit/{faq}" , "FAQController@edit")->can("show-faq")->name("admin.content.faq.edit");
            Route::put("/update/{faq}" , "FAQController@update")->can("show-faq")->name("admin.content.faq.update");
            Route::delete("/destroy/{faq}" , "FAQController@destroy")->can("show-faq")->name("admin.content.faq.destroy");
            Route::get("/status/{faq}" , "FAQController@status")->can("show-faq")->name("admin.content.faq.status");
        });

        // menu
        Route::prefix("menu")->group(function (){
            Route::get("/" , "MenuController@index")->can("show-add-menu")->name("admin.content.menu.index");
            Route::get("/create" , "MenuController@create")->can("show-add-menu")->name("admin.content.menu.create");
            Route::post("/store" , "MenuController@store")->can("show-add-menu")->name("admin.content.menu.store");
            Route::get("/edit/{menu}" , "MenuController@edit")->can("show-add-menu")->name("admin.content.menu.edit");
            Route::put("/update/{menu}" , "MenuController@update")->can("show-add-menu")->name("admin.content.menu.update");
            Route::delete("/destroy/{menu}" , "MenuController@destroy")->can("show-add-menu")->name("admin.content.menu.destroy");
            Route::get("/status/{menu}" , "MenuController@status")->can("show-add-menu")->name("admin.content.menu.status");
        });

        // page
        Route::prefix("page")->group(function (){
            Route::get("/" , "PageController@index")->can("show-create-page")->name("admin.content.page.index");
            Route::get("/create" , "PageController@create")->can("show-create-page")->name("admin.content.page.create");
            Route::post("/store" , "PageController@store")->can("show-create-page")->name("admin.content.page.store");
            Route::get("/edit/{page}" , "PageController@edit")->can("show-create-page")->name("admin.content.page.edit");
            Route::put("/update/{page}" , "PageController@update")->can("show-create-page")->name("admin.content.page.update");
            Route::delete("/destroy/{page}" , "PageController@destroy")->can("show-create-page")->name("admin.content.page.destroy");
            Route::get("/status/{page}" , "PageController@status")->can("show-create-page")->name("admin.content.page.status");
        });

        // post
        Route::prefix("post")->group(function (){
            Route::get("/" , "PostController@index")->can("show-content")->name("admin.content.post.index");
            Route::get("/create" , "PostController@create")->can("show-content")->name("admin.content.post.create");
            Route::post("/store" , "PostController@store")->can("show-content")->name("admin.content.post.store");
            Route::get("/edit/{post}" , "PostController@edit")->can("show-content")->name("admin.content.post.edit");
            Route::put("/update/{post}" , "PostController@update")->can("show-content")->name("admin.content.post.update");
            Route::delete("/destroy/{post}" , "PostController@destroy")->can("show-content")->name("admin.content.post.destroy");
            Route::get("/status/{post}" , "PostController@status")->can("show-content")->name("admin.content.post.status");
            Route::get("/commentable/{post}" , "PostController@commentable")->can("show-content")->name("admin.content.post.commentable");
        });

        // banner
        Route::prefix("banner")->group(function (){
            Route::get("/" , "BannerController@index")->can("show-banners")->name("admin.content.banner.index");
            Route::get("/create" , "BannerController@create")->can("show-banners")->name("admin.content.banner.create");
            Route::post("/store" , "BannerController@store")->can("show-banners")->name("admin.content.banner.store");
            Route::get("/edit/{banner}" , "BannerController@edit")->can("show-banners")->name("admin.content.banner.edit");
            Route::put("/update/{banner}" , "BannerController@update")->can("show-banners")->name("admin.content.banner.update");
            Route::delete("/destroy/{banner}" , "BannerController@destroy")->can("show-banners")->name("admin.content.banner.destroy");
            Route::get("/status/{banner}" , "BannerController@status")->can("show-banners")->name("admin.content.banner.status");
        });

    });




    Route::prefix("user")->namespace("User")->group(function (){

        // admin user
        Route::prefix("adminUser")->group(function (){
            Route::get("/" , "AdminUserController@index")->can("show-admins")->name("admin.user.adminUser.index");
            Route::get("/create" , "AdminUserController@create")->can("add-admins")->name("admin.user.adminUser.create");
            Route::post("/store" , "AdminUserController@store")->can("add-admins")->name("admin.user.adminUser.store");
            Route::get("/edit/{user}" , "AdminUserController@edit")->can("add-admins")->name("admin.user.adminUser.edit");
            Route::put("/update/{user}" , "AdminUserController@update")->can("add-admins")->name("admin.user.adminUser.update");
            Route::delete("/destroy/{user}" , "AdminUserController@destroy")->can("add-admins")->name("admin.user.adminUser.destroy");
            Route::get("/status/{user}" , "AdminUserController@status")->can("add-admins")->name("admin.user.adminUser.status");
            Route::get("/roles/{admin}" , "AdminUserController@roles")->can("add-admins")->name("admin.user.adminUser.roles");
            Route::post("/roles/{admin}/store" , "AdminUserController@rolesStore")->can("add-admins")->name("admin.user.adminUser.roles.store");
            Route::get("/permissions/{admin}" , "AdminUserController@permissions")->can("add-admins")->name("admin.user.adminUser.permissions");
            Route::post("/permissions/{admin}/store" , "AdminUserController@permissionsStore")->can("add-admins")->name("admin.user.adminUser.permissions.store");
        });

        // customer
        Route::prefix("customer")->group(function (){
            Route::get("/" , "CustomerController@index")->can("show-users")->name("admin.user.customer.index");
            Route::get("/create" , "CustomerController@create")->can("show-users")->name("admin.user.customer.create");
            Route::post("/store" , "CustomerController@store")->can("show-users")->name("admin.user.customer.store");
            Route::get("/edit/{user}" , "CustomerController@edit")->can("show-users")->name("admin.user.customer.edit");
            Route::put("/update/{user}" , "CustomerController@update")->can("show-users")->name("admin.user.customer.update");
            Route::delete("/destroy/{user}" , "CustomerController@destroy")->can("show-users")->name("admin.user.customer.destroy");
            Route::get("/status/{user}" , "CustomerController@status")->can("show-users")->name("admin.user.customer.status");
        });

        // role
        Route::prefix("role")->group(function (){
            Route::get("/" , "RoleController@index")->can("add-admins")->name("admin.user.role.index");
            Route::get("/create" , "RoleController@create")->can("add-admins")->name("admin.user.role.create");
            Route::post("/store" , "RoleController@store")->can("add-admins")->name("admin.user.role.store");
            Route::get("/edit/{role}" , "RoleController@edit")->can("add-admins")->name("admin.user.role.edit");
            Route::put("/update/{role}" , "RoleController@update")->can("add-admins")->name("admin.user.role.update");
            Route::delete("/destroy/{role}" , "RoleController@destroy")->can("add-admins")->name("admin.user.role.destroy");
            Route::get("/permissionForm/{role}" , "RoleController@permissionForm")->can("add-admins")->name("admin.user.role.permissionForm");
            Route::put("/permissionUpdate/{role}" , "RoleController@permissionUpdate")->can("add-admins")->name("admin.user.role.permissionUpdate");
        });

        // permission
        Route::prefix("permission")->group(function (){
            Route::get("/" , "PermissionController@index")->can("add-admins")->name("admin.user.permission.index");
            Route::get("/create" , "PermissionController@create")->can("add-admins")->name("admin.user.permission.create");
            Route::post("/store" , "PermissionController@store")->can("add-admins")->name("admin.user.permission.store");
            Route::get("/edit/{id}" , "PermissionController@edit")->can("add-admins")->name("admin.user.permission.edit");
            Route::put("/update/{id}" , "PermissionController@update")->can("add-admins")->name("admin.user.permission.update");
            Route::delete("/destroy/{id}" , "PermissionController@destroy")->can("add-admins")->name("admin.user.permission.destroy");
        });

    });




    Route::prefix("notify")->namespace("Notify")->group(function (){

        // email
        Route::prefix("email")->group(function (){
            Route::get("/" , "EmailController@index")->can("notifications")->name("admin.notify.email.index");
            Route::get("/create" , "EmailController@create")->can("notifications")->name("admin.notify.email.create");
            Route::post("/store" , "EmailController@store")->can("notifications")->name("admin.notify.email.store");
            Route::get("/edit/{email}" , "EmailController@edit")->can("notifications")->name("admin.notify.email.edit");
            Route::put("/update/{email}" , "EmailController@update")->can("notifications")->name("admin.notify.email.update");
            Route::delete("/destroy/{email}" , "EmailController@destroy")->can("notifications")->name("admin.notify.email.destroy");
            Route::get("/status/{email}" , "EmailController@status")->can("notifications")->name("admin.notify.email.status");
        });

        // email file
        Route::prefix("email-file")->group(function (){
            Route::get("/{email}" , "EmailFileController@index")->can("notifications")->name("admin.notify.emailFile.index");
            Route::get("/{email}/create" , "EmailFileController@create")->can("notifications")->name("admin.notify.emailFile.create");
            Route::post("/{email}/store" , "EmailFileController@store")->can("notifications")->name("admin.notify.emailFile.store");
            Route::get("/edit/{file}" , "EmailFileController@edit")->can("notifications")->name("admin.notify.emailFile.edit");
            Route::put("/update/{file}" , "EmailFileController@update")->can("notifications")->name("admin.notify.emailFile.update");
            Route::delete("/destroy/{file}" , "EmailFileController@destroy")->can("notifications")->name("admin.notify.emailFile.destroy");
            Route::get("/status/{file}" , "EmailFileController@status")->can("notifications")->name("admin.notify.emailFile.status");
        });

        // sms->can("notifications")
        Route::prefix("sms")->group(function (){
            Route::get("/" , "SMSController@index")->can("notifications")->name("admin.notify.sms.index");
            Route::get("/create" , "SMSController@create")->can("notifications")->name("admin.notify.sms.create");
            Route::post("/store" , "SMSController@store")->can("notifications")->name("admin.notify.sms.store");
            Route::get("/edit/{sms}" , "SMSController@edit")->can("notifications")->name("admin.notify.sms.edit");
            Route::put("/update/{sms}" , "SMSController@update")->can("notifications")->name("admin.notify.sms.update");
            Route::delete("/destroy/{sms}" , "SMSController@destroy")->can("notifications")->name("admin.notify.sms.destroy");
            Route::get("/status/{sms}" , "SMSController@status")->can("notifications")->name("admin.notify.sms.status");
        });

    });




    Route::prefix("ticket")->namespace("Ticket")->group(function (){

        // ticket
        Route::get("/" , "TicketController@index")->can("show-tickets")->name("admin.ticket.index");
        Route::get("/new-tickets" , "TicketController@newTickets")->can("show-tickets")->name("admin.ticket.newTickets");
        Route::get("/open-tickets" , "TicketController@openTickets")->can("show-tickets")->name("admin.ticket.openTickets");
        Route::get("/close-tickets" , "TicketController@closeTickets")->can("show-tickets")->name("admin.ticket.closeTickets");
        Route::get("/show/{ticket}" , "TicketController@show")->can("show-tickets")->name("admin.ticket.show");
        Route::post("/answer/{ticket}" , "TicketController@answer")->can("show-tickets")->name("admin.ticket.answer");
        Route::get("/change/{ticket}" , "TicketController@change")->can("show-tickets")->name("admin.ticket.change");

        // ticket category
        Route::prefix("category")->group(function (){
            Route::get("/" , "TicketCategoryController@index")->can("show-tickets")->name("admin.ticket.category.index");
            Route::get("/create" , "TicketCategoryController@create")->can("show-tickets")->name("admin.ticket.category.create");
            Route::post("/store" , "TicketCategoryController@store")->can("show-tickets")->name("admin.ticket.category.store");
            Route::get("/edit/{ticketCategory}" , "TicketCategoryController@edit")->can("show-tickets")->name("admin.ticket.category.edit");
            Route::put("/update/{ticketCategory}" , "TicketCategoryController@update")->can("show-tickets")->name("admin.ticket.category.update");
            Route::delete("/destroy/{ticketCategory}" , "TicketCategoryController@destroy")->can("show-tickets")->name("admin.ticket.category.destroy");
            Route::get("/status/{ticketCategory}" , "TicketCategoryController@status")->can("show-tickets")->name("admin.ticket.category.status");
        });

        // ticket priority
        Route::prefix("priority")->group(function (){
            Route::get("/" , "TicketPriorityController@index")->can("show-tickets")->name("admin.ticket.priority.index");
            Route::get("/create" , "TicketPriorityController@create")->can("show-tickets")->name("admin.ticket.priority.create");
            Route::post("/store" , "TicketPriorityController@store")->can("show-tickets")->name("admin.ticket.priority.store");
            Route::get("/edit/{ticketPriority}" , "TicketPriorityController@edit")->can("show-tickets")->name("admin.ticket.priority.edit");
            Route::put("/update/{ticketPriority}" , "TicketPriorityController@update")->can("show-tickets")->name("admin.ticket.priority.update");
            Route::delete("/destroy/{ticketPriority}" , "TicketPriorityController@destroy")->can("show-tickets")->name("admin.ticket.priority.destroy");
            Route::get("/status/{ticketPriority}" , "TicketPriorityController@status")->can("show-tickets")->name("admin.ticket.priority.status");
        });

        // ticket admin
        Route::prefix("admin")->group(function (){
            Route::get("/" , "TicketAdminController@index")->can("show-tickets")->name("admin.ticket.admin.index");
            Route::get("/set/{admin}" , "TicketAdminController@set")->can("show-tickets")->name("admin.ticket.admin.set");
        });

    });




    Route::prefix("setting")->namespace("Setting")->group(function (){

        // setting
        Route::get("/" , "SettingController@index")->can("access-settings")->name("admin.setting.index");
        Route::get("/edit/{setting}" , "SettingController@edit")->can("access-settings")->name("admin.setting.edit");
        Route::put("/update/{setting}" , "SettingController@update")->can("access-settings")->name("admin.setting.update");
        Route::delete("/destroy/{setting}" , "SettingController@destroy")->can("access-settings")->name("admin.setting.destroy");

    });

    // notifications
    Route::post("/notifications/read-all" , "NotificationController@readAll")->name("admin.notification.readAll");

});


Route::namespace("App\Http\Controllers\Auth\User")->group(function (){
    // login register pages
    Route::get("login-register" , "LoginRegisterController@loginRegisterForm")->name("auth.user.loginRegisterForm");
    Route::middleware("throttle:user-login-register-limiter")->post("login-register" , "LoginRegisterController@loginRegister")->name("auth.user.loginRegister");
    // confirm login register code page
    Route::get("login-confirm/{token}" , "LoginRegisterController@loginConfirmForm")->name("auth.user.loginConfirmForm");
    Route::middleware("throttle:user-login-confirm-limiter")->post("login-confirm/{token}" , "LoginRegisterController@loginConfirm")->name("auth.user.loginConfirm");
    // resend otp code
    Route::middleware("throttle:user-login-resend-otp-limiter")->get("login-resend-otp/{token}", "LoginRegisterController@loginResendOtp")->name("auth.user.loginResendOtp");
    Route::get("/logout", "LoginRegisterController@logout")->name("auth.user.logout");
});


// user routes
Route::namespace("App\Http\Controllers\User")->group(function (){
    Route::get("/", "HomeController@home")->name("user.home");
    Route::get("/products/{category?}", "HomeController@products")->name("user.products");
    Route::get("/page/{page:slug}", "HomeController@page")->name("user.page");
    Route::get("/search", "HomeController@search")->name("user.search");
    Route::get("/faq", "HomeController@faq")->name("user.faq");
    Route::get("/terms-and-policy", "HomeController@terms")->name("user.terms");
    Route::get("/about-us", "HomeController@aboutUs")->name("user.aboutUs");

    Route::namespace("Market")->group(function (){
        Route::get("/product/{product:slug}", "ProductController@product")->name("user.market.product");
        Route::post("/add-comment/{product:slug}", "ProductController@addComment")->name("user.market.addComment");
        Route::get("/add-to-favorite/{product:slug}", "ProductController@addToFavorite")->name("user.market.addToFavorite");
        Route::get("/add-to-compare/{product:slug}", "ProductController@addToCompare")->name("user.market.addToCompare");
        Route::post("/add-rate/{product:slug}", "ProductController@addRate")->name("user.market.addRate");
    });

    Route::namespace("Content")->group(function (){
        Route::get("/post/{post:slug}", "PostController@post")->name("user.content.post");
        Route::post("/post/add-comment/{post:slug}", "PostController@addComment")->name("user.content.addComment");
        Route::get("/posts", "PostController@posts")->name("user.content.posts");
    });


    Route::namespace("SalesProcess")->group(function (){
        // shopping cart
        Route::get("/cart", "CartController@cart")->name("user.salesProcess.cart");
        Route::post("/cart", "CartController@update")->name("user.salesProcess.updateCart");
        Route::post("/add-to-cart/{product:slug}", "CartController@add")->name("user.salesProcess.addToCart");
        Route::get("/remove-from-cart/{cartItem}", "CartController@remove")->name("user.salesProcess.removeFormCart");

        //profile completion
        Route::get("/Profile-completion", "ProfileCompletionController@ProfileCompletion")->name("user.salesProcess.profileCompletion");
        Route::post("/Profile-completion", "ProfileCompletionController@update")->name("user.salesProcess.profileCompletionUpdate");

        Route::middleware("profile.completion")->group(function (){
            // address
            Route::get("/address-and-delivery", "AddressController@addressAndDelivery")->name("user.salesProcess.addressAndDelivery");
            Route::post("/address-and-delivery", "AddressController@addAddress")->name("user.salesProcess.addAddress");
            Route::put("/update-and/{address}", "AddressController@updateAddress")->name("user.salesProcess.updateAddress");
            Route::get("/get-cities/{province}", "AddressController@getCities")->name("user.salesProcess.getCities");
            Route::post("/choose-address-and-delivery", "AddressController@chooseAddressAndDelivery")->name("user.salesProcess.chooseAddressAndDelivery");

            // payment
            Route::get("/payment", "PaymentController@payment")->name("user.salesProcess.payment");
            Route::post("/copan-discount", "PaymentController@copanDiscount")->name("user.salesProcess.copanDiscount");
            Route::post("/payment-submit", "PaymentController@paymentSubmit")->name("user.salesProcess.paymentSubmit");
            Route::any("/payment-callback/{order}/{onlinePayment}", "PaymentController@paymentCallback")->name("user.salesProcess.paymentCallback");
        });
    });

    Route::prefix("profile")->namespace("Profile")->group(function (){
        // my orders
        Route::get("/orders", "OrderController@index")->name("user.profile.orders");
        Route::get("/orders/{order}", "OrderController@show")->name("user.profile.order.show");
        // my favorites
        Route::get("/my-favorites", "FavoriteController@index")->name("user.profile.favorites");
        Route::get("/my-favorites/delete/{product}", "FavoriteController@delete")->name("user.profile.favorites.delete");
        // my compares
        Route::get("/my-compares", "CompareController@index")->name("user.profile.compares");
        Route::get("/my-compares/remove/{product:slug}", "CompareController@remove")->name("user.profile.compares.remove");
        // my tickets
        Route::get("/my-tickets", "TicketController@index")->name("user.profile.tickets");
        Route::get("/my-tickets/show/{ticket}" , "TicketController@show")->name("user.profile.tickets.show");
        Route::post("/my-tickets/answer/{ticket}" , "TicketController@answer")->name("user.profile.tickets.answer");
        Route::get("/my-tickets/change/{ticket}" , "TicketController@change")->name("user.profile.tickets.change");
        Route::get("/my-tickets/create" , "TicketController@create")->name("user.profile.tickets.create");
        Route::post("/my-tickets/create" , "TicketController@store")->name("user.profile.tickets.store");
        Route::get("/my-tickets/download" , "TicketController@create")->name("user.profile.tickets.create");
        // my profile
        Route::get("/", "ProfileCOntroller@index")->name("user.profile.profile");
        Route::put("/update", "ProfileCOntroller@update")->name("user.profile.update");
        // my addresses
        Route::get("/my-addresses", "AddressController@index")->name("user.profile.addresses");
    });

});






Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
