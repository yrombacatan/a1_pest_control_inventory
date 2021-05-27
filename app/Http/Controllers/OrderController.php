<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Repositories\OrderRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Flash;
use Response;
use DB;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetails;

class OrderController extends AppBaseController
{
    /** @var  OrderRepository */
    private $orderRepository;

    public function __construct(OrderRepository $orderRepo)
    {
        $this->middleware('permission:order-list|order-create|order-edit|order-delete', ['only' => ['index','show']]);
        $this->middleware('permission:order-create', ['only' => ['create','store']]);
        $this->middleware('permission:order-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:order-delete', ['only' => ['destroy']]);

        $this->orderRepository = $orderRepo;
    }

    /**
     * Display a listing of the Order.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $orders = $this->orderRepository->all();

        return view('orders.index')
            ->with('orders', $orders);
    }

    /**
     * Show the form for creating a new Order.
     *
     * @return Response
     */
    public function create()
    {
        $uid = auth()->user()->id;
        $roles = auth()->user()->role;
        $role_name = DB::table('roles')->where('roles.id', '=', $roles)->select('name')->first();

        // if($roles == 1){
            $users = DB::table('users')
                ->join('department', 'users.dept', '=', 'department.id')
                ->where('users.is_active', '=', 1)
                ->where('department.id', '=', 1) // 1 = field technician
                ->select('users.id as user_id', 'users.name as user_name','users.designation as user_desig', 'department.id as dept_id', 'department.name as dept_name')
                ->get();
        // } else {
            $users_technician = DB::table('users')
                ->join('department', 'users.dept', '=', 'department.id')
                ->where('users.is_active', '=', 1)
                ->where('department.id', '=', 1) // 1 = field technician
                ->where('users.id', '=', $uid) // current technician
                ->select('users.id as user_id', 'users.name as user_name','users.designation as user_desig', 'department.id as dept_id', 'department.name as dept_name')
                ->get();
        // }

        if($roles == 1){
            $userOptions = array('' => 'Select') + $users->pluck('user_name', 'user_id')->toArray();
        } else {
            $userOptions = $users_technician->pluck('user_name', 'user_id')->toArray();
        }


        $productOptions = Product::all();
        return view('orders.create', compact('productOptions','userOptions'));
    }

    /**
     * Store a newly created Order in storage.
     *
     * @param CreateOrderRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderRequest $request)
    {
        $roles = auth()->user()->role;
        // check if role is Technician
        if($roles == 5){
            $orderStat = 1; // Stat: Picked Up
        } else {
            $orderStat = 0; // Stat: Pending
        }

        $Order_TransNo = IdGenerator::generate(['table' => 'outgoing_order', 'field' => 'transac_no', 'length' => 10, 'prefix' => 'ORD-']);

        $input = $request->all();
        
        $fields =
        [
            'transac_no'        =>  $Order_TransNo,
            'transac_date'      =>  $input['transac_date'],
            'order_by'          =>  $input['order_by'],
            'total_order_cost'  =>  $input['total_order_cost'],
            'order_stat'        =>  $orderStat,
            'remarks'           =>  $input['remarks']
        ];

        if(count($request->item_name) > 0)
        {
            foreach($request->item_name as $item=>$v){
                $data2 = array(
                    'transac_no' => $Order_TransNo,
                    'product_id' => $request->item_id[$item],
                    'prod_qty' => $request->item_qty[$item],
                    'prod_price' => $request->item_prc[$item],
                    'prod_total' => $request->item_ttl_prc[$item]
                );
                OrderDetails::insert($data2);
            }
        }

        $order = $this->orderRepository->create($fields);

        Flash::success('Order saved successfully.');

        return redirect(route('orders.index'));
    }

    /**
     * Display the specified Order.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        $orderTransID = Order::where('id', $id)->pluck('transac_no');

        $products = DB::table('outgoing_order_details')
            ->join('outgoing_order', 'outgoing_order_details.transac_no', '=', 'outgoing_order.transac_no')
            ->join('product', 'outgoing_order_details.product_id', '=', 'product.id')
            ->where('outgoing_order_details.transac_no', '=', $orderTransID)
            ->select('outgoing_order.id as order_id', 'outgoing_order.transac_no as order_transno', 'outgoing_order.transac_date as order_transdate','outgoing_order.order_by as order_orderby','outgoing_order.total_order_cost as order_ttl_cost','outgoing_order.remarks as order_remarks','outgoing_order_details.id as orderdtl_id', 'outgoing_order_details.transac_no as orderdtl_transno', 'outgoing_order_details.product_id as orderdtl_prodid','outgoing_order_details.prod_qty as orderdtl_prodqty','outgoing_order_details.prod_price as orderdtl_prodprc','outgoing_order_details.prod_total as orderdtl_prdttl','product.id as prod_id', 'product.sku_barcode_id as prod_barcode', 'product.name as prod_name','product.unit_type as prod_unit', 'product.price as prod_prc')
            ->get();

        return view('orders.show', compact('products'))
                ->with('order', $order);
    }

    /**
     * Show the form for editing the specified Order.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $orderTransID = Order::where('id', $id)->pluck('transac_no');

        $products = DB::table('outgoing_order_details')
            ->join('outgoing_order', 'outgoing_order_details.transac_no', '=', 'outgoing_order.transac_no')
            ->join('product', 'outgoing_order_details.product_id', '=', 'product.id')
            ->where('outgoing_order_details.transac_no', '=', $orderTransID)
            ->select('outgoing_order.id as order_id', 'outgoing_order.transac_no as order_transno', 'outgoing_order.transac_date as order_transdate','outgoing_order.order_by as order_orderby','outgoing_order.total_order_cost as order_ttl_cost','outgoing_order.remarks as order_remarks','outgoing_order_details.id as orderdtl_id', 'outgoing_order_details.transac_no as orderdtl_transno', 'outgoing_order_details.product_id as orderdtl_prodid','outgoing_order_details.prod_qty as orderdtl_prodqty','outgoing_order_details.prod_price as orderdtl_prodprc','outgoing_order_details.prod_total as orderdtl_prdttl','product.id as prod_id', 'product.sku_barcode_id as prod_barcode', 'product.name as prod_name','product.unit_type as prod_unit', 'product.price as prod_prc')
            ->get();

        $users = DB::table('users')
            ->join('department', 'users.dept', '=', 'department.id')
            ->where('users.is_active', '=', 1)
            ->whereNull('users.deleted_at')
            ->where('department.id', '=', 1) // 1 = field technician
            ->select('users.id as user_id', 'users.name as user_name','users.designation as user_desig', 'department.id as dept_id', 'department.name as dept_name')
            ->get();


        $userOptions = array('' => 'Select') + $users->pluck('user_name', 'user_id')->toArray();
        $productOptions = Product::all();

        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        return view('orders.edit', compact('products', 'productOptions', 'userOptions'))
                ->with('order', $order);
    }


    /**
     * Update the specified Order in storage.
     *
     * @param int $id
     * @param UpdateOrderRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderRequest $request)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        // First, search for existing records and delete based from transaction no.
        $orderTransID = Order::where('id', $id)->pluck('transac_no');
        $product = OrderDetails::where('transac_no', '=', $orderTransID )->delete();

        // Finally, insert the updated records
        if(count($request->item_name) > 0)
        {
            foreach($request->item_name as $item=>$v){
                $data2 = array(
                    'transac_no' => $request['transac_no'],
                    'product_id' => $request->item_id[$item],
                    'prod_qty' => $request->item_qty[$item],
                    'prod_price' => $request->item_prc[$item],
                    'prod_total' => $request->item_ttl_prc[$item]
                );
                OrderDetails::insert($data2);
            }
        }

        $order = $this->orderRepository->update($request->all(), $id);

        Flash::success('Order updated successfully.');

        return redirect(route('orders.index'));
    }

    /**
     * Remove the specified Order from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $order = $this->orderRepository->find($id);

        if (empty($order)) {
            Flash::error('Order not found');

            return redirect(route('orders.index'));
        }

        $this->orderRepository->delete($id);

        Flash::success('Order deleted successfully.');

        return redirect(route('orders.index'));
    }

    // Show User in the (table) index page
    public static function order_user($user_id)
    {
        $user = User::where('id', $user_id)->first();
        return $user;
    }

}
