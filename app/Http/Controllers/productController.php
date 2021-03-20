<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Manufacture;
//use App\Tag;
use App\Size;
use App\Color;
//use App\Products;
use App\Product;
use App\medias;
use App\products_images;
use App\ProductCategories;
use App\product_variants;
use DB;

class productController extends Controller
{
    public function createProduct()
    {

    	$categories = Category::where('status',1)->get();
    	$manufacturers = Manufacture::where(array('status' => 1,'deleted' => 0))->get();
        $sizes = Size::all();
        $colors = Color::all();
    	return view('admin.product.createProduct')->with(['categories' => $categories,'manufacturers' => $manufacturers,'sizes' => $sizes,'colors' => $colors]);
    }

    public function storeProduct(Request $request)
    {
        $this->validate($request,[
            'productName'               =>      'required',
            'productImage'              =>      'required',
            'productCode'               =>      'required',
            'productShortDescription'   =>      'required',
            'productPrice'              =>      'required',
            'productQuantity'           =>      'required',
            'status'                    =>      'required',
            'productCategory'           =>      'required',
            'productManufacturers'      =>      'required'
        ]);


        $checkProductCode = Product::where('productCode',$request->productCode)->first();
        if($checkProductCode)
        {
            return redirect('/product/add')->with('message','Product Code is already exists !)');
        }


        //Add product Single Image

        if($request->hasFile('productImage'))
        {
            $mainImage = $request->file('productImage');
            //return $mainImage->getClientOriginalName(); all image name
            $getTime = $mainImage->getATime();
            //return $mainImage->getClientOriginalExtension(); Extension
            $imageName = $mainImage->getClientOriginalName();
            $path      = 'public/products';
            $getImgName = explode(".",$imageName);
            $fullImgName = $getTime.$request->productName.'.'.$getImgName['1'];

            $mainImage->move($path,$fullImgName);
            
            $addSingleMediaImg = new medias();
            $addSingleMediaImg->media_src = $fullImgName;
            $addSingleMediaImg->save();
            $last_media_id = $addSingleMediaImg->media_id;
        }



        // Add product Details

        $addProduct = new Product();
        $addProduct->productName = $request->productName;
        $addProduct->productSlug = str_slug($request->productName);
        $addProduct->productImage = $last_media_id;
        $addProduct->productCode = $request->productCode;
        $addProduct->productShortDescription = $request->productShortDescription;
        $addProduct->productLongDescription = $request->productLongDescription;
        $addProduct->productRegularPrice = $request->productPrice;
        $addProduct->productSalePrice = $request->productSalePrice;
        $addProduct->productQuantity = $request->productQuantity;
        $addProduct->status = $request->status;
        $addProduct->tagIds = implode(',', $request->tags);
        $addProduct->manufactureId = $request->productManufacturers;
        $addProduct->save();
        $last_product_id = $addProduct->id;


        // Add product Gallery Image

        if($request->hasFile('productGalleryImage'))
        {
            $galleryImage = $request->file('productGalleryImage');

            foreach ($galleryImage as $galleryImg) {

                $rand = (rand(1,10000));
                $galleryImgName = $galleryImg->getClientOriginalName();
                $path           = 'public/products';
                $ImgName        = explode(".",$galleryImgName);
                $fullName       = $rand.$request->productName.'.'.$ImgName['1'];
                $galleryImg->move($path,$fullName);

                //  Add images in media table

                $addGalleryImg = new medias();
                $addGalleryImg->media_src = $fullName;
                $addGalleryImg->save();
                $last_media_id = $addGalleryImg->media_id;

                //  Add  image id and product id in product_images table

                $addProductImages = new products_images();
                $addProductImages->product_id = $last_product_id;
                $addProductImages->media_id = $last_media_id;
                $addProductImages->save();
    
            }

        }


        // Add product Category


        if(!empty($request->productCategory))
        {
           foreach ($request->productCategory as $category) {
               
                $addProductCategory = new ProductCategories();
                $addProductCategory->productId = $last_product_id;
                $addProductCategory->categoryId = $category;
                $addProductCategory->save();
           }

        }


        // Product Varient add 

        if($request->var_size[0]!='' || $request->var_color[0]!='')
        {
            $i=0;
            $var_size = $request->var_size;
            $var_color = $request->var_color;
            $var_qty = $request->var_qty;
            $var_extraPrice = $request->var_extraPrice;
            foreach($var_size as $size_names){

                    $addProductVarient = new product_variants();
                    $addProductVarient->productId = $last_product_id;
                    $addProductVarient->sizeId = $size_names;
                    $addProductVarient->colorId = $var_color[$i];
                    $addProductVarient->qty = $var_qty[$i];
                    $addProductVarient->extraPrice = $var_extraPrice[$i];
                    $addProductVarient->save();

                $i++;
            }

        }

    	return redirect('/product/add')->with('message','Product Added Successfully !)');
    }


    public function listProduct()
    {
        $data = DB::table('products')
                    ->join('manufactures','products.manufactureId','=', 'manufactures.id')
                    ->join('medias','products.productImage','=','medias.media_id')
                    ->select('products.*','manufactures.manufactureName','medias.media_src')
                    ->orderBy('products.id','DESC')
                    ->paginate(10);

        return view('admin.product.listProduct')->with('products',$data);
    }

    public function viewProduct($id)
    {

        $single_product = $this->getSingleProductDetails($id);
        $singleProductCategories = $this->getSingleProductCategories($id);
        $singleProductGalleryImage = $this->getSingleProductGalleryImage($id);
        $singleProductVariants = $this->getSingleProductVariants($id);

        // echo '<pre>';
        // print_r($single_product);
        // echo "<br>";
        // print_r($singleProductCategories);
        // echo "<br>";
        // print_r($singleProductGalleryImage);
        // echo "<br>";
        // print_r($singleProductVariants);
        // exit();

        return view('admin.product.viewProduct',[
            'single_product' => $single_product,
            'singleProductCategories' => $singleProductCategories,
            'singleProductGalleryImage' => $singleProductGalleryImage,
            'singleProductVariants' => $singleProductVariants
        ]);
    }


    public function editProduct($id)
    {
        $categories = Category::where('status',1)->get();
        $manufacturers = Manufacture::where(array('status' => 1, 'deleted' => 0))->get();
        $sizes = Size::all();
        $colors = Color::all();

        $single_product = $this->getSingleProductDetails($id);
        $singleProductCategories = $this->getSingleProductCategories($id);
        $singleProductGalleryImage = $this->getSingleProductGalleryImage($id);
        $singleProductVariants = $this->getSingleProductVariants($id);

        return view('admin.product.editProduct',[
            'single_product' => $single_product,
            'singleProductCategories' => $singleProductCategories,
            'singleProductGalleryImage' => $singleProductGalleryImage,
            'singleProductVariants' => $singleProductVariants,
            'categories' => $categories,
            'manufacturers' => $manufacturers,
            'sizes' => $sizes,
            'colors' => $colors
        ]);


    }


    protected function getSingleProductDetails($id)
    {
    
        $single_product = DB::table('products')
                            ->join('manufactures','products.manufactureId','=','manufactures.id')
                            ->join('medias','products.productImage','=','medias.media_id')
                            ->where('products.id',$id)
                            ->select('products.*','manufactures.id as manuId','manufactures.manufactureName','medias.media_src')
                            ->get();

        return $single_product;

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

    public function updateProduct(Request $request)
    {
        $this->validate($request,[
            'productName'               =>      'required',
            'productCode'               =>      'required',
            'productShortDescription'   =>      'required',
            'productPrice'              =>      'required',
            'productQuantity'           =>      'required',
            'status'                    =>      'required',
            'productCategory'           =>      'required',
            'productManufacturers'      =>      'required'
        ]);

        // Product Varient add 

        if(isset($request->var_size[0])!='' || isset($request->var_color[0])!='')
        {
            $deleteProVar = product_variants::where('productId',$request->productID);
            $deleteProVar->delete();

            $i=0;
            $var_size = $request->var_size;
            $var_color = $request->var_color;
            $var_qty = $request->var_qty;
            $var_extraPrice = $request->var_extraPrice;
            foreach($var_size as $size_names){

                    $addProductVarient = new product_variants();
                    $addProductVarient->productId = $request->productID;
                    $addProductVarient->sizeId = $size_names;
                    $addProductVarient->colorId = $var_color[$i];
                    $addProductVarient->qty = $var_qty[$i];
                    $addProductVarient->extraPrice = $var_extraPrice[$i];
                    $addProductVarient->save();

                $i++;
            }

        }

        // $where = array('productCode' => $request->productCode,'id' =>'!'. $request->productID);
        // $checkProductCode = Product::where($where)->first();
        // if($checkProductCode)
        // {
        //     return redirect('/product/add')->with('message','Product Code is already exists !)');
        // }

        //Add product Single Image

        if($request->hasFile('productImage'))
        {
            $mainImage = $request->file('productImage');
            $getTime = $mainImage->getATime();
            $imageName = $mainImage->getClientOriginalName();
            $path      = 'public/products';
            $getImgName = explode(".",$imageName);
            $fullImgName = $getTime.$request->productName.'.'.$getImgName['1'];

            $mainImage->move($path,$fullImgName);
            
            $addSingleMediaImg = new medias();
            $addSingleMediaImg->media_src = $fullImgName;
            $addSingleMediaImg->save();
            $last_media_id = $addSingleMediaImg->media_id;
        }

        // Update product Details

        $updateProduct = Product::find($request->productID);
        $updateProduct->productName = $request->productName;
        if(isset($last_media_id))
        { 
            $updateProduct->productImage = $last_media_id;
        }
        $updateProduct->productSlug = str_slug($request->productName);
        $updateProduct->productCode = $request->productCode;
        $updateProduct->productShortDescription = $request->productShortDescription;
        $updateProduct->productLongDescription = $request->productLongDescription;
        $updateProduct->productRegularPrice = $request->productPrice;
        $updateProduct->productSalePrice = $request->productSalePrice;
        $updateProduct->productQuantity = $request->productQuantity;
        $updateProduct->status = $request->status;
        $updateProduct->tagIds = implode(',',$request->tags);
        $updateProduct->manufactureId = $request->productManufacturers;
        $updateProduct->save();



        // Update product Gallery Image

        if($request->hasFile('productGalleryImage'))
        {
            $deleteProImages = products_images::where('product_id',$request->productID);
            $deleteProImages->delete();

            $galleryImage = $request->file('productGalleryImage');

            foreach ($galleryImage as $galleryImg) {

                $rand = (rand(1,10000));
                $galleryImgName = $galleryImg->getClientOriginalName();
                $path           = 'public/products';
                $ImgName        = explode(".",$galleryImgName);
                $fullName       = $rand.$request->productName.'.'.$ImgName['1'];
                $galleryImg->move($path,$fullName);

                //  Add images in media table

                $addGalleryImg = new medias();
                $addGalleryImg->media_src = $fullName;
                $addGalleryImg->save();
                $last_media_id = $addGalleryImg->media_id;

                //  Add  image id and product id in product_images table

                $addProductImages = new products_images();
                $addProductImages->product_id = $request->productID;
                $addProductImages->media_id = $last_media_id;
                $addProductImages->save();
    
            }

        }

        // Update product Category

        if(!empty($request->productCategory))
        {

            $deleteProCat = ProductCategories::where('productId',$request->productID);
            $deleteProCat->delete();
            foreach ($request->productCategory as $category) {
               
                $addProductCategory = new ProductCategories();
                $addProductCategory->productId = $request->productID;
                $addProductCategory->categoryId = $category;
                $addProductCategory->save();
            }

        }

        return redirect('/product/list')->with('message','Product Updated Successfully !)');
    }


    public function deleteProduct($id)
    {

        $Product = Product::find($id);
        $Product->delete();

        $deleteProImages = products_images::where('product_id',$id);
        $deleteProImages->delete();

        $deleteProCat = ProductCategories::where('productId',$id);
        $deleteProCat->delete();

        $deleteProVar = product_variants::where('productId',$id);
        $deleteProVar->delete();

        return redirect('/product/list')->with('message','Product Deleted Successfully !)');
    }

    
}
