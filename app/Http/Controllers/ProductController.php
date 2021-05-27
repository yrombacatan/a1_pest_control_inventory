<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\ProductRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Flash;
use Response;
use DB;
use App\Models\ProductCategory;
use App\Models\Supplier;

class ProductController extends AppBaseController
{
    /** @var  ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);

        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the Product.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $products = $this->productRepository->all();

        return view('products.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        //return view('products.create');
        $prod_cat = DB::table('product_category')
            ->where('product_category.is_active','=', 1)
            ->whereNull('deleted_at')
            ->select(DB::raw('name, id'));

        $supplier = DB::table('supplier')
            ->where('supplier.is_active','=', 1)
            ->whereNull('deleted_at')
            ->select(DB::raw('name, id'));

        $prodCatOptions = array('' => 'Select Category') + $prod_cat->pluck('name', 'id')->toArray();
        $supplierOptions = array('' => 'Select Supplier') + $supplier->pluck('name', 'id')->toArray();

        return view('products.create', compact('prodCatOptions', 'supplierOptions'));
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $productID = IdGenerator::generate(['table' => 'product', 'field' => 'gen_id', 'length' => 10, 'prefix' => 'ITM-']);

        $input = $request->all();

        $fields =
        [
            'gen_id'            =>  $productID,
            'sku_barcode_id'    =>  $input['sku_barcode_id'],
            'name'              =>  $input['name'],
            'description'       =>  $input['description'],
            'price'             =>  $input['price'],
            'unit_type'         =>  $input['unit_type'],
            'category_id'       =>  $input['category_id'],
            'supplier_id'       =>  $input['supplier_id'],
            'buying_date'       =>  $input['buying_date'],
            'expire_date'       =>  $input['expire_date'],
            'is_active'             =>  1
        ];

        $product = $this->productRepository->create($fields);

        Flash::success('Product saved successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Display the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $prod_cat = DB::table('product_category')
            ->where('product_category.is_active','=', 1)
            ->whereNull('deleted_at')
            ->select(DB::raw('name, id'));

        $supplier = DB::table('supplier')
            ->where('supplier.is_active','=', 1)
            ->whereNull('deleted_at')
            ->select(DB::raw('name, id'));

        $prodCatOptions = array('' => 'Select Category') + $prod_cat->pluck('name', 'id')->toArray();
        $supplierOptions = array('' => 'Select Supplier') + $supplier->pluck('name', 'id')->toArray();

        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('products.edit', compact('prodCatOptions', 'supplierOptions'))
            ->with('product', $product);
    }

    /**
     * Update the specified Product in storage.
     *
     * @param int $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $product = $this->productRepository->update($request->all(), $id);

        Flash::success('Product updated successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success('Product deleted successfully.');

        return redirect(route('products.index'));
    }

    public static function prod_category($category_id)
    {
        $category = ProductCategory::where('id', $category_id)->first();
        return $category;
    }

    public static function prod_supplier($supplier_id)
    {
        $supplier = Supplier::where('id', $supplier_id)->first();
        return $supplier;
    }
}
