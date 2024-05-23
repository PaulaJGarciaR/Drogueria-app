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
        $orders = Order::select('customers.name', 'customers.identification_document', 'orders.id', 'orders.date_of_sale','orders.total_payment','orders.status','orders.registeredby')
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
            'status'=>1,
        ]);
        $total_payment = 0;

        $storage_product_Id = $request->product_id;
        $storage_product_quantity = $request->quantity;
        for ($i = 0; $i < count($storage_product_Id); $i++) {
            $product = Product::find($storage_product_Id[$i]);
            $quantity = $storage_product_quantity[$i];
            $subtotal = $product->price_sale * $quantity;

            $order->ordersdetails()->create([
                'quantity' => $quantity,
                'subtotal' => $subtotal,
                'product_id' => $product->id,
                'registeredby' => $request->user()->id,
            ]);

            $total_payment += $subtotal;
        }

         $order->total_payment = $total_payment;
        $order->save();

        return redirect()->route("orders.index")->with('successMsg', 'order created');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)

    {
        $order = Order::select('customers.name', 'customers.identification_document', 'orders.id', 'orders.date_of_sale','orders.total_payment','orders.status')
        ->join('customers', 'orders.customer_id', '=', 'customers.id')
        ->first();
         $details = OrderDetail::select('products.name','products.price_sale','ordersdetails.quantity','ordersdetails.subtotal')
         ->join('products','ordersdetails.product_id','=','products.id')
         ->where('ordersdetails.order_id', '=', $id)
         ->get();
        

        

         return view("orders.show", compact("order","details"));

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
        return redirect()->route('orders.index')->with("successMsg", "Order deleted.");
    }
    public function changestatusorder(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->status = $request->status;
        $order->save();
    }
}
