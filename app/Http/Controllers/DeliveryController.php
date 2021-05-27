<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDeliveryRequest;
use App\Http\Requests\UpdateDeliveryRequest;
use App\Repositories\DeliveryRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\DeliveryDetails;

class DeliveryController extends AppBaseController
{
    /** @var  DeliveryRepository */
    private $deliveryRepository;

    public function __construct(DeliveryRepository $deliveryRepo)
    {
        $this->middleware('permission:delivery-list|delivery-create|delivery-edit|delivery-delete', ['only' => ['index','show']]);
        $this->middleware('permission:delivery-create', ['only' => ['create','store']]);
        $this->middleware('permission:delivery-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:delivery-delete', ['only' => ['destroy']]);

        $this->deliveryRepository = $deliveryRepo;
    }

    /**
     * Display a listing of the Delivery.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $deliveries = $this->deliveryRepository->all();

        return view('deliveries.index')
            ->with('deliveries', $deliveries);
    }

    /**
     * Show the form for creating a new Delivery.
     *
     * @return Response
     */
    public function create()
    {
        $supplier = DB::table('supplier')
            ->where('supplier.is_active','=', 1)
            ->whereNull('deleted_at')
            ->select(DB::raw('name, id'));

        $productOptions = Product::all()
            ->whereNull('deleted_at');

        $supplierOptions = array('' => 'Select Supplier') + $supplier->pluck('name', 'id')->toArray();

        return view('deliveries.create', compact('productOptions', 'supplierOptions'));
    }

    /**
     * Store a newly created Delivery in storage.
     *
     * @param CreateDeliveryRequest $request
     *
     * @return Response
     */
    public function store(CreateDeliveryRequest $request)
    {
        $input = $request->all();

        if(count($request->item_name) > 0)
        {
            foreach($request->item_name as $item=>$v){
                $data2 = array(
                    'ref_no' => $input['ref_no'],
                    'product_id' => $request->item_id[$item],
                    'quantity' => $request->item_qty[$item],
                    'unit_type' => $request->item_unit[$item],
                    'buying_price' => $request->item_prc[$item],
                    'total_cost' => $request->item_ttl_prc[$item]
                );
                DeliveryDetails::insert($data2);
            }
        }

        $delivery = $this->deliveryRepository->create($input);

        Flash::success('Delivery saved successfully.');

        return redirect(route('deliveries.index'));
    }

    /**
     * Display the specified Delivery.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $delivery = $this->deliveryRepository->find($id);

        if (empty($delivery)) {
            Flash::error('Delivery not found');

            return redirect(route('deliveries.index'));
        }

        $deliveryTransID = Delivery::where('id', $id)->pluck('ref_no');

        $products = DB::table('incoming_delivery_details')
            ->join('incoming_delivery', 'incoming_delivery_details.ref_no', '=', 'incoming_delivery.ref_no')
            ->join('product', 'incoming_delivery_details.product_id', '=', 'product.id')
            ->where('incoming_delivery_details.ref_no', '=', $deliveryTransID)
            ->select('incoming_delivery.id as delivery_id', 'incoming_delivery.ref_no as delivery_transno', 'incoming_delivery.transac_date as delivery_transdate', 'incoming_delivery.supplier_id as supplier', 'incoming_delivery.total_prod_costs as delivery_ttl_cost', 'incoming_delivery.remarks as delivery_remarks', 'incoming_delivery_details.id as dlvrydtl_id', 'incoming_delivery_details.ref_no as dlvrydtl_refno', 'incoming_delivery_details.product_id as dlvrydtl_prodid', 'incoming_delivery_details.quantity as dlvrydtl_prodqty', 'incoming_delivery_details.buying_price as dlvrydtl_prodprc', 'incoming_delivery_details.total_cost as dlvrydtl_prdttl', 'product.id as prod_id', 'product.sku_barcode_id as prod_barcode', 'product.name as prod_name', 'product.unit_type as prod_unit', 'product.price as prod_prc')
            ->get();

        return view('deliveries.show', compact('products'))
                ->with('delivery', $delivery);
    }

    /**
     * Show the form for editing the specified Delivery.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $supplier = DB::table('supplier')
            ->where('supplier.is_active','=', 1)
            ->whereNull('deleted_at')
            ->select(DB::raw('name, id'));

        $productOptions = Product::all()
            ->whereNull('deleted_at');

        $supplierOptions = array('' => 'Select Supplier') + $supplier->pluck('name', 'id')->toArray();

        $delivery = $this->deliveryRepository->find($id);

        if (empty($delivery)) {
            Flash::error('Delivery not found');

            return redirect(route('deliveries.index'));
        }

        return view('deliveries.edit', compact('productOptions', 'supplierOptions'))
                ->with('delivery', $delivery);
    }

    /**
     * Update the specified Delivery in storage.
     *
     * @param int $id
     * @param UpdateDeliveryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDeliveryRequest $request)
    {
        $delivery = $this->deliveryRepository->find($id);

        if (empty($delivery)) {
            Flash::error('Delivery not found');

            return redirect(route('deliveries.index'));
        }

        $delivery = $this->deliveryRepository->update($request->all(), $id);

        Flash::success('Delivery updated successfully.');

        return redirect(route('deliveries.index'));
    }

    /**
     * Remove the specified Delivery from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $delivery = $this->deliveryRepository->find($id);

        if (empty($delivery)) {
            Flash::error('Delivery not found');

            return redirect(route('deliveries.index'));
        }

        $this->deliveryRepository->delete($id);

        Flash::success('Delivery deleted successfully.');

        return redirect(route('deliveries.index'));
    }

    public static function delivery_supplier($supplier_id)
    {
        $supplier = Supplier::where('id', $supplier_id)->first();
        return $supplier;
    }
}
