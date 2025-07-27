<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;


class OrderController extends Controller
{
    public function store(Request $request){
    
    

    $validated = $request->validate([

        'provider_id' => 'integer',
        'service_id' => 'integer',
        'total_time' => 'string',
        'earnings' => 'string',
        'status' => 'string',

    ]);
    
    Order::create($validated);
    
    
    return redirect()->back();
    }

    public function stats(){

    //////////////////////////////////////////////////////////////
    $lastOrderDate = Order::latest('created_at')->value('created_at');
    $startDate = Carbon::parse($lastOrderDate)->subDays(6)->startOfDay();
    $ordersevendays = Order::whereBetween('created_at', [$startDate, $lastOrderDate])->get()->where('status', 'confirmed');
    //////////////////////////////////////////////////////////////
    
        return view('statistic', compact('ordersevendays'));
    }

    public function show_provider(){
    
    $providers = Order::select('provider_id')->distinct()->pluck('provider_id');

        return view('order', compact('providers'));
    }

    public function stats_provider(Request $request){

    ////////////////////////////////////////////////
    $provider_id = $request->input('provider_id');
    $status = $request->input('status');
    $ordersproviders = Order::where('provider_id', $provider_id)->where('status', $status)->get();
    ////////////////////////////////////////////////
    
    return view('statisticproviders', compact('ordersproviders'));

    }
}
