<?php

namespace App\Http\Controllers;
//Hacer en Orders
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Saledetail;
use App\Models\Sale;
use Carbon\Carbon;
use Illuinate\Support\Facades\DB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales=Sale::all();
        return view('sales.index',compact('sales'));
        $sales=Sale::select('customers.name','customers.identidicationdocument','sales.date_of_sale','sales.total_payment','sales.status')->join('customers','customers_id','=','sale.customer_id');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers=Customer::where('status','=','1')->orderBy('name')->get();
        $products=Product::where('status','=','1')->orderBy('name')->get();
        $date_of_sale=Carbon::now();
        $date_of_sale=$date_of_sale->format('Y-m-d');

        return view('sales.create',compact('customers','products','date_of_sale'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaleRequest $request)
    {
        DB::beginTransaction();
        try{
          $sale=new sale();
          $sale->total_payment=$request->total_payment;
          $sale->date_of_sale=$request->date_of_sale;
          $sale->customer_id=$request;
          $sale->ruta=$request->ruta;
          $sale->status=1;
          $sale->registeredby=$request->user()->id; ;
          $sale->save();

          $sale_id=$sale->id;

          $cont=0;
          while($cont<count($item)){
            $saledetail=new DetailSale();
            $saledetail->sale_id=$id_sale;

          }

        }catch(Exception $e){
            return redirect()->back()-with('successMsg','Error while registering the information');
        }
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
    public function destroy(string $id)
    {
        //
    }
}
