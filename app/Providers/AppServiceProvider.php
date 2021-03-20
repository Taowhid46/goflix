<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Category;
use App\Theme_options;
use App\Product;
use App\product_categories;
use App\Manufacture;
use App\wishlist;
use App\order;
use Session;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //View::share('themeName','Lara Shop');  //  Load themeName in whole website;

        // Load Data in specific page
        // View::composer('public.includes.menubar',function($view){
        //     $view->with('themeName','Lara Shop');
        // });

        // Load Data In Whole Template

        View::composer('*',function($view){

            $id = 1;
            $ThemeDatas = Theme_options::where('id',$id)->first();
            $view->with('ThemeData',$ThemeDatas);

        });


        // Load Data in specific(menubar) page
        View::composer('public.includes.sidebar',function($view){

            $saleCategories = DB::table('product_categories')
                        ->join('categories','categories.id','=','product_categories.categoryId','left')
                        ->join('products','products.id','=','product_categories.productId','left')
                        ->where('products.status',1)
                        ->whereNotNull('products.productSalePrice')
                        ->select('products.id as proId','products.productName','products.productSalePrice','products.status','product_categories.id as proCatId','product_categories.productId as proCatProId','product_categories.categoryId as proCatCatId','categories.id as categoryId','categories.categoryName as categoryName','categories.categorySlug as categorySlug')
                        ->get();

            $allManufactures = Manufacture::where(['status' => 1,'deleted' => 0])->get();
            $view->with(['saleCategories' => $saleCategories,'allManufactures' => $allManufactures]);

        });
        // Load Data in specific(menubar) page
        View::composer('public.includes.menubar',function($view){
            $cusId = Session::get('customerId');
            $cusWishlist = wishlist::where('customer_id',$cusId)->whereNull('deleted_at')->get();
            $view->with(['cusWishlist' => $cusWishlist]);

        });



        // Load Data in specific(header) page
        View::composer('admin.includes.header',function($view){

            $unseenOrders = DB::table('orders')
                          ->join('customers','orders.customer_id','=','customers.id')
                          ->where('orders.seen',0)
                          ->whereNull('orders.deleted_at')
                          ->select('customers.name','orders.*')
                          ->get();
            $view->with(['unseenOrders' => $unseenOrders]);

        });



        // Load Data in header page
        View::composer('*',function($view){

            $allCategory = Category::where('status',1)->get();
            $view->with('allCategory',$allCategory);

        });


        // Load Data in header page
        View::composer('*',function($view){

            $allManufactures = Manufacture::where(['status' => 1,'deleted' => 0])->get();
            $view->with('allManufactures',$allManufactures);

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
