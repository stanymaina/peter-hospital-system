<?php

namespace App\Http\Controllers;

use View;
use App\Category;
use App\Product;
use App\Hirepurchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products   =   Product::all();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return View::make('product.edit', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products   =   new Product;
        $products   ->product_name                  =   $request->ProductName;
        $products   ->product_category_id           =   $request->ProductCategory;
        $products   ->product_price                 =   $request->ProductPrice;
        $products   ->product_hire_pruchase_type    =   'Not available';   
        $products   ->save();

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $hire_purchase_optione  =   DB::table('hirepurchases')->where('hire_purchase_min_price','<',$product->product_price)
                                    ->where('hire_purchase_max_price','>',$product->product_price)
                                    //->take(3)
                                    ->get();
        $hire_purchase_options  =   Hirepurchase::orderBy('hire_purchase_min_price','ASC')->get();

        $i = 1;
        $productprice   =   $product->product_price;                                    
        $hire_purchase_choises = array();
        foreach($hire_purchase_options as $hire_purchase_option){
            $min_price  =   $hire_purchase_option->hire_purchase_min_price;
            $max_price  =   $hire_purchase_option->hire_purchase_max_price;
            if($min_price <= $productprice){
                // Profit on Hire Purchase
                $selling_price  =   $hire_purchase_option->hire_purchase_percentage;
                $selling_price  =   $selling_price+100;
                $selling_price  =   $selling_price/100;
                $selling_price  =   $selling_price*$productprice;

                // Principle
                $principle  =   $hire_purchase_option->hire_purchase_percentage_principle;
                $principle  =   $principle/100;
                $principle  =   $principle*$selling_price;

                // Installments
                $installments  =   $selling_price - $principle;
                $installments  =   $installments/$hire_purchase_option->hire_purchase_payment_duration;;
                //$installments  =   $principle*$productprice;

                $hire_purchase_choises[] = [
                    'plan_class'=>$i,
                    'hire_purchase_id'=> $hire_purchase_option->id,
                    'hire_purchase_name'=> $hire_purchase_option->hire_purchase_name,
                    'hire_purchase_duration'=> $hire_purchase_option->hire_purchase_payment_duration,
                    'product_price'=> $productprice,
                    'product_hire_purchase_price'=> $selling_price,
                    'product_principle' => $principle,
                    'product_installments' => $installments,
                ];
            } else {
                $hire_purchase_choises[] = [
                    'hire_purchase_plan' => [
                        'message'=>'No Hire Purchase plan is available.'
                    ]
                ];
            }
            
            $i++;
        }

         $compact = compact('product','hire_purchase_choises');
         //return $compact;

        //return view('product.show', compact('product'));
        return view('product.show', compact('product','hire_purchase_choises'));
        // return $hire_purchase_choises;
        // return $hire_purchase_options;
        //return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        
        return View::make('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product   ->product_name                  =   $request->ProductName;
        $product   ->product_category_id           =   $request->ProductCategory;
        $product   ->product_price                 =   $request->ProductPrice;
        $product   ->product_hire_pruchase_type    =   'Not available';   
        $product   ->save();

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
