<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::select('customers.name', 'customers.identification_document', 'orders.id', 'orders.date_of_sale')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->get();



        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $customers = Customer::all();
        //  $products = Product::all();
        $customers = Customer::where('status', '=', '1')->orderBy('name')->get();
        $products = Product::where('status', '=', '1')->orderBy('name')->get();
        $ordersdetails = OrderDetail::all();



        return view('orders.create', compact('customers', 'products', 'ordersdetails'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = Order::create([
            'customer_id' => Customer::find($request->customer)->id,
            'date_of_sale' => Carbon::now()->toDateTimeString(),
            'total_payment' => 0,
            'registeredby' => $request->user()->id,
        ]);
        $order->status = 1;
        $order->registeredby = $request->user()->id;
        $ProductIds = Product::pluck('id')->toArray();
        $storage_product_quantity = $request->quantity;
        $total_payment = 0;
        $productId = $request->input('product');
        echo $productId;
        
        for ($i = 0; $i < count($ProductIds); $i++) {
            $product_find = Product::find($ProductIds[$i]);
            if ($product_find==$productId) {

                $subtotal = $storage_product_quantity * $product_find->price_sale;
                $order->orderdetail()->create([
                    'product_id' => $product_find->id,
                    'quantity' => $storage_product_quantity,
                    'subtotal' => $subtotal,
                    'registeredby' => $request->user()->id,
                ]);
                $total_payment += $subtotal;

            }
            ;
        }
        ;

        $order->total_payment = $total_payment;


        $order->save();
        return redirect()->route('orders.index')->with('successMsg', 'Successful Registration');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('customers.index')->with('delete', 'ok');
    }
    public function changestatusorder(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->status = $request->status;
        $order->save();
    }
}
