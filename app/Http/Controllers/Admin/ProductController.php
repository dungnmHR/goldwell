<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductInfoCatRequest as InfoRequest;
use App\Http\Requests\ProductRequest as ProductRequest;
use App\Product;

class ProductController extends Controller
{
    
    public function getInfoTrangDanhMuc()
    {
        //
        $info_ = config('product.thong-tin');
        return view('admin.products.info_page',['flag' => 'gd', 'info' => $info_]);
    }

    public function updateInfoTrangDanhMuc()
    {
        //
        $info_ = config('product.thong-tin');
        return view('admin.products.update_info_page',['flag' => 'gd', 'info' => $info_]);
    }

     public function storeInfoTrangDanhMuc(InfoRequest $request)
    {
        config(['product.thong-tin.title' => $request->title]);
        config(['product.thong-tin.image' => $request->image]);
        config(['product.thong-tin.content' => $request->content_sp_info]);
        $fp = fopen(base_path() .'/config/product.php' , 'w');
        fwrite($fp, '<?php return ' . var_export(config('product'), true) . ';');
        fclose($fp);
        $info_ = config('product.thong-tin');
        return view('admin.products.info_page',['flag' => 'gd', 'info' => $info_]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        config(['product.thong-tin.title' => 'OK']);
        $fp = fopen(base_path() .'/config/product.php' , 'w');
        fwrite($fp, '<?php return ' . var_export(config('product'), true) . ';');
        fclose($fp);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.products.create',['flag' => 'p_n']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        if (isset($request->sp_botro)){
            $request->merge(['sp_botro' => implode(";", $request->sp_botro)]);  
        }  
        $product = Product::create($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
