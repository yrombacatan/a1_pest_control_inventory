<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Client;
use App\Models\JobOrder;
use App\Models\Service;
use App\Models\Material;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $services = Service::where('is_active', '=', 1)->get();
        // $materials = Material::where('is_active', '=', 1)->get();
        // $jobOrders = JobOrder::where('is_active', '=', 1)->get();
        // $activeClients = Client::where('is_active', '=', 1)->get();

        // return view('home', compact('jobOrders','services','materials'))
        // ->with('activeClients', $activeClients);

        // app('auth')->user()->givePermissionTo('product-list','supplier-list');
        // app('auth')->user()->givePermissionTo('product-cat-list','delivery-list');
        // app('auth')->user()->givePermissionTo('order-list','department-list');
        // app('auth')->user()->givePermissionTo('department-edit','user-list','user-create','user-edit');

        // dd(
        //     app('auth')->user()->getRoleNames(),
        //     app('auth')->user()->getAllPermissions()->toArray(),
        //     app('auth')->user()->can('order-create'),
        //     app('auth')->user()->hasPermissionTo('order-create')
        // );

        return view('home');

    }


}
