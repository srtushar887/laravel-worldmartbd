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

Route::get('/', 'FrontendController@index')->name('front');
Route::get('/about-us', 'FrontendController@about_us')->name('aboutus');
Route::get('/contact-us', 'FrontendController@contact_us')->name('contactus');
Route::get('/privacy-policy', 'FrontendController@privacy_policy')->name('pricacy.policy');
Route::get('/terms-conditions', 'FrontendController@terms_conditions')->name('terms');
Route::get('/dealer-policy', 'FrontendController@dealer_policy')->name('dealer.policy');
Route::get('/return-policy', 'FrontendController@return_policy')->name('return.policy');
Route::get('/support-policy', 'FrontendController@support_policy')->name('support.policy');
Route::get('/all-products', 'FrontendController@all_products')->name('all.product');
Route::get('/product-view/{id}', 'FrontendController@product_view')->name('product.details');
Route::get('/add-to-cart-single/{id}', 'FrontendController@add_to_cart_single')->name('add.to.cart.single');
Route::post('/add-to-cart-product-details', 'FrontendController@add_to_cart_product_details')->name('add.to.cart.product.details');
Route::get('/remove-cart-single/{id}', 'FrontendController@remove_cart_single')->name('cart.remove.single');
Route::get('/view-cart', 'FrontendController@view_cart')->name('view.cart');
Route::post('/cart-update-cart-page', 'FrontendController@cart_update_cart_page')->name('card.update.cart.page');
Route::post('/cart-delete-cart-page', 'FrontendController@cart_delete_cart_page')->name('card.delete.cart.page');
Route::get('/search', 'FrontendController@search')->name('product.search.header');


//filter product
Route::post('/get-all-product', 'FrontendFilterController@filter_product')->name('get.all.product.by.filter');
Route::get('/get-all-product', 'FrontendFilterController@filter_product_get');


Route::get('/category-product/{id}', 'FrontendController@main_category_products')->name('topcat.prodyct');
Route::get('/sub-category-product/{id}', 'FrontendController@mid_category_products')->name('mid.cat.products');
Route::get('/sub-sub-category-product/{id}', 'FrontendController@end_category_products')->name('end.cat.products');



//social login
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');



Auth::routes();



//user data ****************************************
Route::group(['middleware' => ['auth']], function() {
    Route::group(['prefix' => 'home'], function ()
    {
        Route::get('/', 'HomeController@index')->name('home');

        //order history
        Route::get('/order-history', 'User\UserProfileController@order_history')->name('user.order.history');

        //profile
        Route::get('/profile', 'User\UserProfileController@profile')->name('user.profile');
        Route::post('/profile-update', 'User\UserProfileController@profile_update')->name('user.profile.update');


       //chnage pass
        Route::get('/change-password', 'User\UserProfileController@chnage_pass')->name('user.change.pass');
        Route::post('/change-password-save', 'User\UserProfileController@chnage_pass_save')->name('user.password.update');

        //checkout
        Route::get('/checkout', 'User\UserProfileController@check_out')->name('user.checkout');
        Route::post('/checkout-save', 'User\UserProfileController@check_out_save')->name('user.checkoit.save');
    });
});

//end user data ****************************************





//start admin data ****************************************

Route::prefix('admin')->group(function (){
    Route::get('/login', 'Auth\AdminLoginController@showLoginform')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::group(['middleware' => ['auth:admin']], function() {
    Route::prefix('admin')->group(function() {
        Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');

        //general setting
        Route::get('/general-settings', 'Admin\AdminController@general_setting')->name('admin.general.settings');
        Route::post('/general-settings-update', 'Admin\AdminController@general_setting_save')->name('admin.general.setting.update');

        //payment gateway
        Route::get('/payment-gateway', 'Admin\AdminController@payment_gateway')->name('admin.payment.gateway');
        Route::post('/payment-gateway-save', 'Admin\AdminController@payment_gateway_save')->name('admin.payment.gateway.save');
        Route::post('/payment-gateway-update', 'Admin\AdminController@payment_gateway_update')->name('admin.payment.gateway.update');
        Route::post('/payment-gateway-delete', 'Admin\AdminController@payment_gateway_delete')->name('admin.payment.gateway.delete');

        //top category
        Route::get('/top-category', 'Admin\AdminCategoryController@top_category')->name('admin.top.category');
        Route::post('/top-category-save', 'Admin\AdminCategoryController@top_category_save')->name('admin.create.topcat');
        Route::post('/top-category-update', 'Admin\AdminCategoryController@top_category_update')->name('admin.update.topcat');
        Route::post('/top-category-delete', 'Admin\AdminCategoryController@top_category_delete')->name('admin.delete.topcat');

        //middle category
        Route::get('/middle-category', 'Admin\AdminCategoryController@mid_category')->name('admin.middle.category');
        Route::post('/middle-category-save', 'Admin\AdminCategoryController@mid_category_save')->name('admin.create.midcat');
        Route::post('/middle-category-update', 'Admin\AdminCategoryController@mid_category_update')->name('admin.update.midcat');
        Route::post('/middle-category-delete', 'Admin\AdminCategoryController@mid_category_delete')->name('admin.delete.midcat');


        //end category
        Route::get('/end-category', 'Admin\AdminCategoryController@end_category')->name('admin.end.category');
        Route::post('/end-category-save', 'Admin\AdminCategoryController@end_category_save')->name('admin.create.endcat');
        Route::post('/end-category-update', 'Admin\AdminCategoryController@end_category_update')->name('admin.update.endcat');
        Route::post('/end-category-delete', 'Admin\AdminCategoryController@end_category_delete')->name('admin.delete.endcat');
        Route::post('/end-category-delete', 'Admin\AdminCategoryController@end_category_delete')->name('admin.delete.endcat');
        Route::post('/get-mid-cat-data-ajax', 'Admin\AdminCategoryController@get_mid_cat_data_bt_ajax')->name('get_mid_cat_data_ajax');
        Route::post('/get-end-cat-data-ajax', 'Admin\AdminCategoryController@get_end_cat_data_bt_ajax')->name('get_end_cat_data_ajax');



        //brand
        Route::get('/product-brand', 'Admin\AdminCategoryController@product_brand')->name('admin.product.brand');
        Route::post('/product-brand-save', 'Admin\AdminCategoryController@product_brand_save')->name('admin.create.brand');
        Route::post('/product-brand-update', 'Admin\AdminCategoryController@product_brand_update')->name('admin.update.brand');
        Route::post('/product-brand-delete', 'Admin\AdminCategoryController@product_brand_delete')->name('admin.delete.brand');


        //size
        Route::get('/product-size', 'Admin\AdminCategoryController@product_size')->name('admin.product.size');
        Route::post('/product-size-save', 'Admin\AdminCategoryController@product_size_save')->name('admin.create.size');
        Route::post('/product-size-update', 'Admin\AdminCategoryController@product_size_update')->name('admin.update.size');
        Route::post('/product-size-delete', 'Admin\AdminCategoryController@product_size_delete')->name('admin.delete.size');

        //color
        Route::get('/product-color', 'Admin\AdminCategoryController@product_color')->name('admin.product.color');
        Route::post('/product-color-save', 'Admin\AdminCategoryController@product_color_save')->name('admin.create.color');
        Route::post('/product-color-update', 'Admin\AdminCategoryController@product_color_update')->name('admin.update.color');
        Route::post('/product-color-delete', 'Admin\AdminCategoryController@product_color_delete')->name('admin.delete.color');



        //product
        Route::get('/product', 'Admin\AdminProductController@product')->name('admin.product');
        Route::get('/product-create', 'Admin\AdminProductController@product_create')->name('admin.create.product');
        Route::post('/product-save', 'Admin\AdminProductController@product_save')->name('admin.save.product');
        Route::get('/product-update/{id}', 'Admin\AdminProductController@product_view')->name('admin.product.update');
        Route::post('/product-update-save', 'Admin\AdminProductController@product_update_save')->name('admin.update.product');
        Route::post('/product-delete', 'Admin\AdminProductController@product_delete')->name('admin.delete.product');
        Route::post('/product-size-edit-delete', 'Admin\AdminProductController@product_size_edit_delete')->name('admin.delete.size.edit.data');
        Route::post('/product-color-edit-delete', 'Admin\AdminProductController@product_color_edit_delete')->name('admin.delete.color.edit.data');

        //user order
        Route::get('/user-new-order', 'Admin\AdminOrderController@user_new_order')->name('admin.user.new.order');
        Route::get('/user-order-view/{id}', 'Admin\AdminOrderController@user_order_view')->name('user.order.view');
        Route::post('/user-order-save', 'Admin\AdminOrderController@user_order_save')->name('admin.user.order.save');
        Route::get('/user-delivered-order', 'Admin\AdminOrderController@user_delivered_order')->name('admin.user.delivered.order');
        Route::get('/user-rejected-order', 'Admin\AdminOrderController@user_rejected_order')->name('admin.user.rejected.order');
        Route::get('/user-canceled-order', 'Admin\AdminOrderController@user_canceled_order')->name('admin.user.canceled.order');

        //dealer order
        Route::get('/dealer-new-order', 'Admin\AdminOrderController@dealer_new_order')->name('admin.dealer.new.order');
        Route::get('/dealer-delivered-order', 'Admin\AdminOrderController@dealer_delivered_order')->name('admin.dealer.delivered.order');
        Route::get('/dealer-rejected-order', 'Admin\AdminOrderController@dealer_rejected_order')->name('admin.dealer.rejected.order');
        Route::get('/dealer-canceled-order', 'Admin\AdminOrderController@dealer_canceled_order')->name('admin.dealer.cancel.order');
        Route::get('/dealer-order-view/{id}', 'Admin\AdminOrderController@dealer_order_view')->name('dealer.order.view');
        Route::post('/dealer-order-save', 'Admin\AdminOrderController@dealer_order_save')->name('admin.dealer.order.save');

       //seller product
        Route::get('/seller-pending-product', 'Admin\AdminProductController@seller_pending_product')->name('admin.seller.pending.product');
        Route::get('/seller-product-details/{id}', 'Admin\AdminProductController@seller_product_details')->name('admin.seller.product.update');
        Route::post('/seller-product-update', 'Admin\AdminProductController@seller_product_update')->name('admin.update.seller.product');
        Route::get('/seller-approved-product', 'Admin\AdminProductController@seller_approved_product')->name('admin.seller.approved.product');
        Route::get('/seller-rejected-product', 'Admin\AdminProductController@seller_rejected_product')->name('admin.seller.rejected.product');



        //users
        Route::get('/all-users', 'Admin\AdminUserController@all_users')->name('admin.all.users');
        Route::get('/active-users', 'Admin\AdminUserController@active_users')->name('admin.active.users');
        Route::get('/blocked-users', 'Admin\AdminUserController@block_users')->name('admin.blocked.users');
        Route::get('/user-profile/{id}', 'Admin\AdminUserController@user_profile')->name('user.profile.view');
        Route::post('/user-pass-change', 'Admin\AdminUserController@user_pass_change')->name('admin.user.pass.change');
        Route::post('/user-acc-action', 'Admin\AdminUserController@user_account_action')->name('admin.user.account.action');
        Route::post('/user-acc-delete', 'Admin\AdminUserController@user_account_delete')->name('admin.user.delete');


        //dealer
        Route::get('/create-dealer-account', 'Admin\AdminDealerController@create_dealer_account')->name('admin.create.dealer.account');
        Route::post('/dealer-account-save', 'Admin\AdminDealerController@dealer_account_save')->name('admin.dealer.account.save');
        Route::get('/all-dealers', 'Admin\AdminDealerController@all_dealers')->name('admin.all.dealer');
        Route::get('/active-dealers', 'Admin\AdminDealerController@active_dealers')->name('admin.active.dealer');
        Route::get('/blocked-dealers', 'Admin\AdminDealerController@block_dealers')->name('admin.blocked.users');
        Route::get('/dealers-profile/{id}', 'Admin\AdminDealerController@dealers_profile')->name('dealer.profile.view');
        Route::post('/dealers-pass-change', 'Admin\AdminDealerController@dealers_pass_change')->name('admin.dealer.pass.change');
        Route::post('/dealers-acc-action', 'Admin\AdminDealerController@dealers_account_action')->name('admin.dealer.account.action');
        Route::post('/dealers-acc-delete', 'Admin\AdminDealerController@dealers_account_delete')->name('admin.dealer.delete');





        //frontend control
        Route::get('/home-slider', 'Admin\AdminFrontendController@home_slider')->name('admin.home.slider');
        Route::post('/home-slider-save', 'Admin\AdminFrontendController@home_slider_save')->name('admin.slider.save');
        Route::post('/home-slider-update', 'Admin\AdminFrontendController@home_slider_update')->name('admin.slider.update');
        Route::post('/home-slider-delete', 'Admin\AdminFrontendController@home_slider_delete')->name('admin.slider.delete');

        //static data
        Route::get('/static-data', 'Admin\AdminFrontendController@static_data')->name('admin.static.data');
        Route::post('/static-data-update', 'Admin\AdminFrontendController@static_data_update')->name('admin.static.update');

        //social icon
        Route::get('/social-icon', 'Admin\AdminFrontendController@social_icon')->name('admin.social.icon');
        Route::post('/social-icon-save', 'Admin\AdminFrontendController@social_icon_save')->name('admin.social.icon.save');
        Route::post('/social-icon-update', 'Admin\AdminFrontendController@social_icon_update')->name('admin.social.icon.update');
        Route::post('/social-icon-delete', 'Admin\AdminFrontendController@social_icon_delete')->name('admin.social.icon.delete');

    });
});


//***************************end admin section




//***************************start seller section
Route::prefix('seller')->group(function (){
    Route::get('/login', 'Auth\SellerLoginController@showLoginform')->name('seller.login');
    Route::post('/login', 'Auth\SellerLoginController@login')->name('seller.login.submit');
    Route::get('/logout', 'Auth\SellerLoginController@logout')->name('seller.logout');
    Route::get('/register', 'Auth\SellerLoginController@seller_register')->name('seller.register');
    Route::post('/register-save', 'Auth\SellerLoginController@seller_register_save')->name('seller.register.save');
});


Route::group(['middleware' => ['auth:seller']], function() {
    Route::prefix('seller')->group(function() {
        Route::get('/', 'Seller\SellerController@index')->name('seller.dashboard');

        //product
        Route::get('/create-product', 'Seller\SellerProductController@create_product')->name('seller.create.product');
        Route::post('/create-product-save', 'Seller\SellerProductController@create_product_save')->name('seller.save.product');
        Route::get('/product-list', 'Seller\SellerProductController@product_list')->name('seller.product.list');
        Route::get('/product-update/{id}', 'Seller\SellerProductController@product_update')->name('seller.product.update');
        Route::post('/product-size-edit-delete', 'Seller\SellerProductController@product_size_edit_delete')->name('seller.delete.size.edit.data');
        Route::post('/product-color-edit-delete', 'Seller\SellerProductController@product_color_edit_delete')->name('seller.delete.color.edit.data');
        Route::post('/product-update-save', 'Seller\SellerProductController@product_update_save')->name('seller.update.product');
        Route::post('/product-delete', 'Seller\SellerProductController@product_delete')->name('seller.delete.product');
        Route::get('/pending-product-list', 'Seller\SellerProductController@pending_product_list')->name('seller.pending.product.list');
        Route::get('/pending-approved-list', 'Seller\SellerProductController@approved_product_list')->name('seller.approved.product.list');
        Route::get('/pending-rejected-list', 'Seller\SellerProductController@rejected_product_list')->name('seller.rejected.product.list');

    });
});
//***************************end seller section




//***************************start dealer section

Route::prefix('dealer')->group(function (){
    Route::get('/register', 'Auth\DealerLoginController@seller_register')->name('dealer.register');
    Route::post('/register-save', 'Auth\DealerLoginController@seller_register_save')->name('dealer.register.save');
    Route::get('/login', 'Auth\DealerLoginController@showLoginform')->name('dealer.login');
    Route::post('/login', 'Auth\DealerLoginController@login')->name('dealer.login.submit');
    Route::get('/logout', 'Auth\DealerLoginController@logout')->name('dealer.logout');

});

Route::group(['middleware' => ['auth:dealer']], function() {
    Route::prefix('dealer')->group(function() {
        Route::get('/', 'Dealer\DealerController@index')->name('dealer.dashboard');

        //profile
        Route::get('/my-profile', 'Dealer\DealerController@my_profile')->name('dealer.my.profile');
        Route::post('/my-profile-update', 'Dealer\DealerController@my_profile_update')->name('dealer.my.profile.update');

        //change password
        Route::get('/change-password', 'Dealer\DealerController@change_password')->name('dealer.my.password.change');
        Route::post('/change-password-save', 'Dealer\DealerController@change_password_save')->name('dealer.my.password.update');

        //product
        Route::get('/order-product', 'Dealer\DealerProductController@order_product')->name('dealer.order.product');
        Route::post('/product-add-cart', 'Dealer\DealerProductController@product_add_cart')->name('dealer.product.add.cart');
        Route::get('/product-remove-cart/{id}', 'Dealer\DealerProductController@product_remove_cart')->name('dealer.remover.cart.product');
        Route::get('/payment', 'Dealer\DealerProductController@payment')->name('dealer.payment');
        Route::post('/payment-save', 'Dealer\DealerProductController@payment_save')->name('dealer.save.payment');


        //order list
        Route::get('/pending-product-list', 'Dealer\DealerProductController@pending_product_list')->name('dealer.pending.product.list');
        Route::get('/delivered-product-list', 'Dealer\DealerProductController@delivered_product_list')->name('dealer.approved.product.list');
        Route::get('/rejected-product-list', 'Dealer\DealerProductController@rejected_product_list')->name('dealer.rejected.product.list');
        Route::get('/canceled-product-list', 'Dealer\DealerProductController@canceled_product_list')->name('dealer.canceled.product.list');
        Route::get('/my-order-details/{id}', 'Dealer\DealerProductController@my_order_details')->name('my.order.view');

    });
});
