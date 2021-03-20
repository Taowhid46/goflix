<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Product;
use App\Rules\Captcha;
use App\Category;
use App\Manufacture;
use App\wishlist;
use App\product_categories;
use DB;

class WelcomeController extends Controller
{
    public function index()
    {
        $PublishedProducts = DB::table('products')
                        ->join('medias','products.productImage','=','medias.media_id','left')
                        ->where('products.status',1)
                        ->orderBy('products.id','DESC')
                        ->limit(12)
                        ->select('products.*','medias.media_src')
                        ->get();

        $saleProducts = DB::table('products')
                        ->join('medias','products.productImage','=','medias.media_id','left')
                        ->where('products.status',1)
                        ->whereNotNull('products.productSalePrice')
                        ->select('products.*','medias.media_src')
                        ->get();



        $sliders = DB::table('sliders')
                        ->join('medias','sliders.sliderImg','=','medias.media_id','left')
                        ->where('sliders.status',1)
                        ->select('medias.media_src')
                        ->get();


        $wishlist = wishlist::whereNull('deleted_at')->get();
        
    	return view('public.home.homeContent',['allProducts' => $PublishedProducts,'saleProducts' => $saleProducts,'wishlists' => $wishlist,'sliders' => $sliders]);
    }

    public function getProductForSuggest()
    {
        if (isset($_GET['term'])){

            $q = strtolower($_GET['term']);
            $data = Product::where('status',1)
                    ->Where('productName', 'LIKE', '%'.$q.'%')
                    ->get();

            foreach ($data as $value) {
                $finalResult[] = $value->productName;
            }

            return Response::json($finalResult);
        }

    }

    public function searchProduct(Request $request)
    {
        if($request->search_category == "" && $request->search_item == "")
        {
            return redirect('/')->with('message','Search Item One must be field');;
        }
        else
        {
            $item = $request->search_item;
            $category = $request->search_category;


            $products = DB::table('products')
                        ->join('medias','products.productImage','=','medias.media_id','left')
                        ->join('product_categories','products.id','=','product_categories.productId','left')
                        ->orWhere('product_categories.categoryId',$category)
                        ->orWhere('products.productName',$item)
                        ->select('products.*','medias.media_src')
                        ->paginate(50);



            // $saleProducts = DB::table('products')

                            
            //                 ->join('medias','products.productImage','=','medias.media_id','left')
            //                 ->join('product_categories','products.id','=','product_categories.productId','left')
            //                 // ->where('product_categories.categoryId',$category)
            //                 // ->orWhere('products.productName',$item)
            //                 // ->where(function ($query) {
            //                 //     $query->whereNotNull('products.productSalePrice');
            //                 // })
            //                 ->whereNotNull('products.productSalePrice')
            //                 ->orWhere('product_categories.categoryId',$category)
            //                 ->orWhere('products.productName',$item)
            //                 ->limit('3')
            //                 ->select('products.*','product_categories.*','medias.media_src')
            //                 ->get();

            if($item)
            {
                $categoryName = $item;
            }
            else
            {
                $category = Category::where('id',$category)->first();
                $categoryName = $category->categoryName;
            }


        $wishlist = wishlist::whereNull('deleted_at')->get();

            return view('public.category.categoryContent',['products' => $products,'categoryName' => $categoryName,'wishlists' => $wishlist]);

        }

    }

    public function category($slug)
    {

        $category = Category::where('categorySlug',$slug)->first();
        $id = $category->id;
        $categoryName = $category->categoryName;
        $products = DB::table('products')
                        ->join('medias','products.productImage','=','medias.media_id','left')
                        ->join('product_categories','products.id','=','product_categories.productId','left')
                        ->where('products.status',1)
                        ->where('product_categories.categoryId',$id)
                        ->whereNull('products.productSalePrice')
                        ->select('products.*','medias.media_src')
                        // ->select('products.id as proId','products.productName','products.productSlug','products.productRegularPrice','products.productSalePrice','products.productImage','products.manufactureId','products.status','product_categories.*','medias.media_src')
                        // ->get();
                        ->paginate(6);

        $saleProducts = DB::table('products')
                        ->join('medias','products.productImage','=','medias.media_id','left')
                        ->join('product_categories','products.id','=','product_categories.productId','left')
                        ->where('products.status',1)
                        ->where('product_categories.categoryId',$id)
                        ->whereNotNull('products.productSalePrice')
                        // ->latest()
                        ->limit('3')
                        ->select('products.*','medias.media_src')
                        // ->select('products.id as proId','products.productName','products.productSlug','products.productRegularPrice','products.productSalePrice','products.productImage','products.manufactureId','products.status','product_categories.*','medias.media_src')
                        ->get();

        $wishlist = wishlist::whereNull('deleted_at')->get();
        
        return view('public.category.categoryContent',['products' => $products,'saleProducts' => $saleProducts,'categoryName' => $categoryName,'wishlists' => $wishlist]);

    }

    public function manufacture($id)
    {

        $Manufacture = Manufacture::where('id',$id)->first();
        $ManufactureName = $Manufacture->manufactureName;
        $products = DB::table('products')
                        ->join('medias','products.productImage','=','medias.media_id','left')
                        ->where('products.status',1)
                        ->where('products.manufactureId',$id)
                        ->whereNull('products.productSalePrice')
                        ->select('products.*','medias.media_src')
                        ->paginate(6);

        $saleProducts = DB::table('products')
                        ->join('medias','products.productImage','=','medias.media_id','left')
                        ->where('products.status',1)
                        ->where('products.manufactureId',$id)
                        ->whereNotNull('products.productSalePrice')
                        ->limit('3')
                        ->select('products.*','medias.media_src')
                        ->get();

        $wishlist = wishlist::whereNull('deleted_at')->get();
        
        return view('public.category.categoryContent',['products' => $products,'saleProducts' => $saleProducts,'categoryName' => $ManufactureName,'wishlists' => $wishlist]);

    }


    public function SaleProduct($slug)
    {

        $category = Category::where('categorySlug',$slug)->first();
        $id = $category->id;
        $categoryName = $category->categoryName;

        $saleProducts = DB::table('products')
                        ->join('medias','products.productImage','=','medias.media_id','left')
                        ->join('product_categories','products.id','=','product_categories.productId','left')
                        ->where('products.status',1)
                        ->where('product_categories.categoryId',$id)
                        ->whereNotNull('products.productSalePrice')
                        ->select('products.*','medias.media_src')
                        ->get();

        $wishlist = wishlist::whereNull('deleted_at')->get();

    	return view('public.category.categoryContent',['saleProducts' => $saleProducts,'categoryName' => $categoryName,'wishlists' => $wishlist]);

    }


    public function contact()
    {
    	return view('public.contact.contactContent');
    }


    public function productDetails($slug)
    {

        $getSingleProduct = DB::table('products')
                            ->join('medias','products.productImage','=','medias.media_id','left')
                            ->join('manufactures','products.manufactureId','=','manufactures.id','left')
                            ->where('products.status',1)
                            ->where('products.productSlug',$slug)
                            ->select('products.*','medias.media_src','manufactures.manufactureName')
                            ->get();

        $productId = $getSingleProduct[0]->id;

        $singleProductCategories = $this->getSingleProductCategories($productId);
        $singleProductGalleryImage = $this->getSingleProductGalleryImage($productId);
        $singleProductVariants = $this->getSingleProductVariants($productId);

        return view('public.product.productDetailsContent',[
            'singleProduct' => $getSingleProduct,
            'singleProductCategories' => $singleProductCategories,
            'singleProductGalleryImage' => $singleProductGalleryImage,
            'singleProductVariants' => $singleProductVariants,
        ]);


    }


    protected function getSingleProductCategories($id)
    {
        
        $singleProductCat = DB::table('categories')
                            ->join('product_categories','categories.id','=','product_categories.categoryId')
                            ->where('product_categories.productId',$id)
                            ->select('categories.categoryName','categories.id')
                            ->get();

        return $singleProductCat;

    }


    protected function getSingleProductGalleryImage($id)
    {
        
        $singleProductGalleryImage = DB::table('medias')
                            ->join('products_images','medias.media_id','=','products_images.media_id')
                            ->where('products_images.product_id',$id)
                            ->select('medias.media_src')
                            ->get();

        return $singleProductGalleryImage;

    }


    protected function getSingleProductVariants($id)
    {
        
        $singleProductVariants = DB::table('product_variants')
                            ->join('sizes','product_variants.sizeId','=','sizes.sizeId','left')
                            ->join('colors','product_variants.colorId','=','colors.colorId','left')
                            ->where('product_variants.productId',$id)
                            ->select('product_variants.*','sizes.sizeName','colors.colorName')
                            ->get();

        return $singleProductVariants;

    }

    public function allProduct()
    {
        $allProducts = DB::table('products')
                ->join('medias','products.productImage','=','medias.media_id','left')
                ->where('products.status',1)
                ->orderBy('products.id','DESC')
                ->limit(12)
                ->select('products.*','medias.media_src')
                ->paginate(9);

        $wishlist = wishlist::whereNull('deleted_at')->get();

        return view('public.product.allProduct',['allProducts' => $allProducts,'wishlists' => $wishlist]);
    }

    public function contactUs(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|email',
            'email' => 'required|string|email|min:6|',
            'message' => 'required|string|min:6|',
            'g-recaptcha-response' => new Captcha(),
        ]);


        return 'ok';
    }

}

