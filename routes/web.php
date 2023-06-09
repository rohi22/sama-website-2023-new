<?php
/*Route::any('/{any?}', function ($any = null) {
    return Redirect::to($any, 301); 
})->where('any', '.*');
*/
header('Access-Control-Allow-Origin: http://localhost:8080');
Route::get('/login',function (){return view('login');});
Route::post('user.login','LoginController@login');
Route::get('/logout','LoginController@logout');

Route::post('save-quote', 'HomeController@save_quote');

Route::get('tag/sachet-packing-machine', function(){ 
    return Redirect::to('/', 301); 
});

Route::group(['middleware' => 'usersession'], function () {
	
	Route::get('/dashboard','LoginController@dashboard'); 
	
	Route::get('/admin/all-quote', 'LoginController@all_quote');
	
	/*
    |--------------------------------------------------------------------------
    | Menu
    |--------------------------------------------------------------------------
    |
    */
    Route::get('menus','MenuController@index');
    Route::get('/menu/new','MenuController@create');
    Route::post('/menu/new','MenuController@store');
    Route::get('/menu/edit/{id}','MenuController@edit');
    Route::post('/menu/edit/{id}','MenuController@update');
    Route::get('/menu/delete/{id}','MenuController@destroy');
    /*
    |--------------------------------------------------------------------------
    | Attributes
    |--------------------------------------------------------------------------
    |
    */
    Route::get('attributes','AttributeController@index');
    Route::get('/attribute/new','AttributeController@create');
    Route::post('/attribute/new','AttributeController@store');
    Route::get('/attribute/edit/{id}','AttributeController@edit');
    Route::post('/attribute/edit/{id}','AttributeController@update');
    Route::get('/attribute/delete/{id}','AttributeController@destroy');
    /*
    |--------------------------------------------------------------------------
    | Sachet
    |--------------------------------------------------------------------------
    |
    */
    Route::get('sachets','SachetController@index');
    Route::get('/sachet/new','SachetController@create');
    Route::post('/sachet/new','SachetController@store');
    Route::get('/sachet/edit/{id}','SachetController@edit');
    Route::post('/sachet/edit/{id}','SachetController@update');
    Route::get('/sachet/delete/{id}','SachetController@destroy');
    /*
    |--------------------------------------------------------------------------
    | Commodity
    |--------------------------------------------------------------------------
    |
    */
    Route::get('commodities','CommodityController@index');
    Route::get('/commodity/new','CommodityController@create');
    Route::post('/commodity/new','CommodityController@store');
    Route::get('/commodity/edit/{id}','CommodityController@edit');
    Route::post('/commodity/edit/{id}','CommodityController@update');
    Route::get('/commodity/delete/{id}','CommodityController@destroy');
    /*
    |--------------------------------------------------------------------------
    | Categories
    |--------------------------------------------------------------------------
    |
    */
    Route::get('categories','CategoryController@index');
    Route::get('/category/new','CategoryController@create');
    Route::post('/category/new','CategoryController@store');
    Route::get('/category/edit/{id}','CategoryController@edit');
    Route::post('/category/edit/{id}','CategoryController@update');
    Route::get('/category/delete/{id}','CategoryController@destroy');
    Route::get('/category/view_subheads/{id}','CategoryController@view_subheads');
    Route::post('/category/change_status','CategoryController@change_status');
    Route::get('/category/field_list/{id}','CategoryController@field_list');
    Route::post('/category/change_menu','CategoryController@change_menu');
    Route::post('/category/change_product_mode','CategoryController@change_product_mode');
    Route::post('/category/change_theme_mode','CategoryController@change_theme_mode');
    Route::post('/category/get_attribute_list','CategoryController@get_attribute_list');
    Route::post('/category/assign_attribute','CategoryController@assign_attribute');
    Route::get('/category/search','CategoryController@search');
    Route::post('/category/change_cat_order','CategoryController@change_cat_order');
    /*
    |--------------------------------------------------------------------------
    | Sliders
    |--------------------------------------------------------------------------
    |
    */

    Route::get('sliders','SliderController@index');
    Route::get('/slider/new','SliderController@create');
    Route::post('/slider/new','SliderController@store');
    Route::get('/slider/edit/{id}','SliderController@edit');
    Route::post('/slider/edit/{id}','SliderController@update');
    Route::get('/slider/delete/{id}','SliderController@destroy');
    Route::post('/slider/assign_category','SliderController@assign_category');
    Route::post('/slider/get_gallery_images','SliderController@get_gallery_images');
    Route::post('/slider/get_bullets','SliderController@get_bullets');



    /*
    |--------------------------------------------------------------------------
    | Industries
    |--------------------------------------------------------------------------
    |
    */

    Route::get('industries','IndustryController@index');
    Route::get('/industry/new','IndustryController@create');
    Route::post('/industry/new','IndustryController@store');
    Route::get('/industry/edit/{id}','IndustryController@edit');
    Route::post('/industry/edit/{id}','IndustryController@update');
    Route::get('/industry/delete/{id}','IndustryController@destroy');
    

    /*
    |--------------------------------------------------------------------------
    | Home Slider
    |--------------------------------------------------------------------------
    |
    */
    Route::get('home-slider-list','HomeSliderController@index');
    Route::get('/home-slider/new','HomeSliderController@create');
    Route::post('/home-slider/new','HomeSliderController@store');
    Route::get('/home-slider/edit/{id}','HomeSliderController@edit');
    Route::post('/home-slider/edit/{id}','HomeSliderController@update');
    Route::get('/home-slider/delete/{id}','HomeSliderController@destroy');
    Route::post('/home-slider-back-img/new/','HomeSliderController@home_slider_back_img');
    /*
    |--------------------------------------------------------------------------
    | Mobile Slider
    |--------------------------------------------------------------------------
    |
    */
    Route::get('mobile_sliders','MobileSliderController@index');
    Route::get('/mobile_slider/new','MobileSliderController@create');
    Route::post('/mobile_slider/new','MobileSliderController@store');
    Route::get('/mobile_slider/edit/{id}','MobileSliderController@edit');
    Route::post('/mobile_slider/edit/{id}','MobileSliderController@update');
    Route::get('/mobile_slider/delete/{id}','MobileSliderController@destroy');
    Route::post('/mobile_slider/mobile_slider_back_img','MobileSliderController@mobile_slider_back_img');
    /*
    |--------------------------------------------------------------------------
    | Users
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/users','UserController@index');
    Route::get('/user/delete/{id}','UserController@destroy');
    /*
    |--------------------------------------------------------------------------
    | User Roles
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/admin/users','AdminUserController@index');
    Route::get('/admin/add-user','AdminUserController@create');
    Route::post('/admin/new','AdminUserController@store');
    Route::get('/admin/edit/{id}','AdminUserController@edit');
    Route::post('/admin/user/edit/{id}','AdminUserController@update');
    Route::get('/admin/user/delete/{id}','AdminUserController@destroy');
    /*
    |--------------------------------------------------------------------------
    | General Tags
    |--------------------------------------------------------------------------
    |
    */
    Route::get('tag/tag-list','GeneralController@index');
    Route::get('tag/new','GeneralController@create');
    Route::post('tag/new','GeneralController@store');
    Route::get('tag/edit/{id}','GeneralController@edit');
    Route::post('tag/edit/{id}','GeneralController@update');
    Route::get('tag/delete/{id}','GeneralController@destroy');
    /*
    |--------------------------------------------------------------------------
    | Logo & Favicon
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/setting/logo','SettingController@create');
    Route::post('/setting/new','SettingController@store');
    /*
    |--------------------------------------------------------------------------
    | About Us
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/about-us','SettingController@about_us');
    Route::post('/setting/about-us','SettingController@about_store');
    Route::get('/delete_award_images/{id}','SettingController@delete_Award_images')->name('delete_award_image');
     /*
    |--------------------------------------------------------------------------
    | Sama Subscription
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/subscribe-list','SettingController@subscription');
    Route::get('/subscribe/delete/{id}','SettingController@subscribe_delete');
     /*
    |--------------------------------------------------------------------------
    | Spare part list
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/spare_part_list','SettingController@spare_part_list');
    Route::get('/spare_part/delete/{id}','SettingController@spare_part_delete');
     /*
    |--------------------------------------------------------------------------
    | Become Agent List
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/become_agent_list','SettingController@become_agent_list');
    Route::get('/become_agent/delete/{id}','SettingController@become_agent_delete');
    /*
    |--------------------------------------------------------------------------
    | Sama Footer
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/setting/footer','SettingController@footer_section');
    Route::post('/setting/footer/submit','SettingController@footer_submit');
    /*
    |--------------------------------------------------------------------------
    | Contact Us
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/contact-us-page','SettingController@contact_us');
    Route::post('/setting/contact-us-page','SettingController@contact_us_store');
    /*
    |--------------------------------------------------------------------------
    | Change Password
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/setting/change-password','SettingController@change_password');
    Route::post('/setting/change-password','SettingController@changeed_password'); 
    /*
    |--------------------------------------------------------------------------
    | Products
    |--------------------------------------------------------------------------
    |
    */
    Route::get('products','ProductController@index');
    Route::get('/product/new','ProductController@create');
    Route::post('/product/new','ProductController@store');
    Route::get('/product/edit/{id}','ProductController@edit');
    Route::post('/product/edit/{id}','ProductController@update');
    Route::get('/product/delete/{id}','ProductController@destroy');
    Route::post('/product/get_bag_images','ProductController@get_bag_images');
    Route::post('/product/get_commodity_images','ProductController@get_commodity_images');
    Route::post('/product/get_sachet_images','ProductController@get_sachet_images');
    Route::post('/product/change_product_mode','ProductController@change_product_mode');
    Route::post('/product/assign_category','ProductController@assign_category');
    Route::post('/product/change_status','ProductController@change_status');
    Route::post('/product/assign_home_slider','ProductController@assign_home_slider');
    Route::post('/product/get_attributes','ProductController@get_attributes');
    Route::post('/product/get_long_desc','ProductController@get_long_desc');
    Route::get('/product/search','ProductController@search');
    Route::get('/products/filter/{num}','ProductController@product_filter');
    Route::post('/product/assign-actions','ProductController@assign_actions');
    Route::get('/product/view-product/{id}','ProductController@view_product');
    Route::get('/product/view-tags/{id}','ProductController@view_tags');
    Route::get('/product/view-related-machine/{id}','ProductController@viewRelatedMachines');
    Route::get('/product/view-processing-system/{id}','ProductController@viewProcessingSystem');
    Route::get('/product/view-accessories/{id}','ProductController@viewAccessories');
    Route::get('/product/tag-delete/{id}/{p_id}','ProductController@tag_delete');
    Route::get('/product/related-product-delete/{id}/{p_id}','ProductController@related_product_delete');
    Route::get('/product/processing-product-delete/{id}/{p_id}','ProductController@processing_product_delete');
    Route::get('/product/accessories-product-delete/{id}/{p_id}','ProductController@accessories_product_delete');
    
    /*
    |--------------------------------------------------------------------------
    | Blogs Routes
    |--------------------------------------------------------------------------
    |
    */
    /*
    |--------------------------------------------------------------------------
    | Blog Categories
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/blog/categories','blog\CategoryController@index');
    Route::get('/blog/category/new','blog\CategoryController@create');
    Route::post('/blog/category/new','blog\CategoryController@store');
    Route::get('/blog/category/edit/{id}','blog\CategoryController@edit');
    Route::post('/blog/category/edit/{id}','blog\CategoryController@update');
    Route::get('/blog/category/delete/{id}','blog\CategoryController@destroy');
    Route::post('/blog/category/change_status','blog\CategoryController@change_status');
    Route::post('/blog/category/get_tags','blog\CategoryController@get_tags');
    Route::post('/blog/category/change_menu','blog\CategoryController@change_menu');
    Route::post('/blog/category/get_meta_tags','blog\CategoryController@get_meta_tags');
    /*
    |--------------------------------------------------------------------------
    | Blog Posts
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/blog/posts','blog\PostController@index');
    Route::get('/blog/post/new','blog\PostController@create');
    Route::post('/blog/post/new','blog\PostController@store');
    Route::get('/blog/post/edit/{id}','blog\PostController@edit');
    Route::post('/blog/post/edit/{id}','blog\PostController@update');
    Route::get('/blog/post/delete/{id}','blog\PostController@destroy');
    Route::post('/blog/post/change_status','blog\PostController@change_status');
    Route::post('/blog/post/get_tags','blog\PostController@get_tags');
    Route::post('/blog/post/get_meta_tags','blog\PostController@get_meta_tags');
    Route::post('/blog/post/post_feature','blog\PostController@post_feature');
    Route::post('/blog/post/assign_slider','blog\PostController@assign_slider');
    Route::post('/blog/post/assign_case_studies','blog\PostController@assign_caseStudies');
    /*
    |--------------------------------------------------------------------------
    | Blog Sliders
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/blog/sliders','blog\SliderController@index');
    Route::get('/blog/slider/new','blog\SliderController@create');
    Route::post('/blog/slider/new','blog\SliderController@store');
    Route::get('/blog/slider/edit/{id}','blog\SliderController@edit');
    Route::post('/blog/slider/edit/{id}','blog\SliderController@update');
    Route::get('/blog/slider/delete/{id}','blog\SliderController@destroy');
    Route::post('/blog/slider/change_status','blog\SliderController@change_status');
    Route::post('/blog/slider/get_tags','blog\SliderController@get_tags');
    /*
    |--------------------------------------------------------------------------
    | Blog About Us
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/blog/about-us','blog\SettingController@about_us');
    Route::post('/blog/about-us','blog\SettingController@about_store');
    /*
    |--------------------------------------------------------------------------
    | Blog Subscription
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/blog/subscription','blog\SettingController@subscription');
    Route::get('/blog/subscribe/delete/{id}','blog\SettingController@subscribe_delete');
    /*|--------------------------------------------------------------------------
    | Comments
    |--------------------------------------------------------------------------
    |
    */
    Route::get('/blog/comments','blog\SettingController@comments');
    Route::get('/blog/comment/delete/{id}','blog\SettingController@comment_delete');
    Route::post('/blog/comment/change_status','blog\SettingController@change_status');


});
/*
|--------------------------------------------------------------------------
| Sama Engineering front
|--------------------------------------------------------------------------
|
*/

Route::prefix('revamp')->group(function () {
    Route::get('/','RevampController@index');
    Route::get('/category/{slug}','RevampController@get_category')->name('productCategoryWise');
    Route::get('/sub-category/{slug}','RevampController@get_sub_category')->name('productSubCategoryWise');
    Route::get('/get-products','RevampController@get_products')->name('get_products');
    Route::get('contactUs','RevampController@contactUsWidget')->name('contactUsWidget');
    Route::get('/product/{slug}','RevampController@single_product');
    Route::get('tag/{slug}','RevampController@product_tag')->name('productTag');
    Route::get('/about','RevampController@about')->name('aboutUs');
    Route::get('/spare-parts','RevampController@spare_parts')->name('spareParts');
    Route::get('/become-an-agent','RevampController@become_an_agent')->name('becomeAnAgent');
    Route::get('/contact-us','RevampController@contactUs')->name('contactUs');
    Route::get('/e-catalogue','RevampController@e_catalogue')->name('eCatalogue');
    Route::get('privacy-policy','RevampController@privacyPolicy')->name('privacyPolicy');
    Route::get('pages/search','RevampController@searchResult')->name('revamp.search');
    // Route::get('pages/search', function(){
    //     return view('revamp/pages/search');
    // })->name('revamp.search');
});

Route::get('/','HomeController@index');
Route::get('/contact-us','HomeController@contact_us');

Route::get('privacy-policy','HomeController@privacyPolicy');

Route::get('/contactus','HomeController@contactus');
// Route::get('processing-system/Direct-PuffCore-Filled-Snack-Line','HomeController@testing');


// New
Route::get('sub-category/dough-divider-spiral', function(){
    return redirect('sub-category/dough-divider');
});
Route::get('sub-category/dough-divider-rounder', function(){
    return redirect('sub-category/dough-divider');
});
// new end

Route::get('/about','HomeController@about');
Route::get('/e-catalogue','HomeController@e_catalogue');
Route::get('/category/{slug}','HomeController@get_category');
Route::get('/sub-category/{slug}','HomeController@get_sub_category');
Route::get('/product/{slug}','HomeController@single_product');
Route::post('/get_products','HomeController@get_products');


Route::get('/catalogs/index','HomeController@get_catalog');
Route::get('/catalogs/snack-processing','HomeController@snack_processing');
Route::get('/catalogs/bakery-series','HomeController@bakery_series');
Route::get('/catalogs/packaging-series','HomeController@packaging_series');
Route::get('/catalogs/kitchen-heart','HomeController@kitchen_heart');
Route::get('/catalogs/doypack','HomeController@doypack'); // old
Route::get('/catalogs/pick-fill-and-seal-machines','HomeController@doypack'); // new 

Route::post('/home/user-detail','HomeController@user_detail_submit');
Route::post('/home/user-detail-submit','HomeController@user_detail_submit_msg');
Route::post('/subscribe-email','HomeController@subscribe_email');

Route::get('refreshcaptcha', 'HomeController@refreshCaptcha');

Route::get('/spare-parts','HomeController@spare_parts');
Route::post('/get_city','HomeController@get_city');
Route::post('/spare-parts/submit','HomeController@submit_spare_parts');

Route::get('/become-an-agent','HomeController@become_an_agent');
Route::post('/get_city','HomeController@get_city');
Route::post('/become-an-agent/submit','HomeController@submit_become_agent');
Route::get('/become-an-agent','HomeController@become_an_agent');
Route::get('/search','HomeController@search');
Route::get('tag/{slug}','HomeController@product_tag');

/*
|--------------------------------------------------------------------------
| Blog Front
|--------------------------------------------------------------------------
|
*/
// Route::get('/clear-cache', function() {
//     $exitCode = Artisan::call('cache:clear');
//     dd($exitCode);
// });

Route::get('/blog','blog\BlogController@index');
Route::post('/blog/subscribe-email','blog\BlogController@subscribe_email');
Route::get('/blog/{category}/{title}','blog\BlogController@single_post');
Route::get('/blog/{category}','blog\BlogController@category');
Route::post('/blog/submit_comment','blog\BlogController@submit_comment');
Route::get('/blog-tag/{tag}','blog\BlogController@get_tag_filter');