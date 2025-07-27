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
    
    $lastOrderDate = Order::latest('created_at')->value('created_at');
    $startDate = Carbon::parse($lastOrderDate)->subDays(6)->startOfDay();

    $orders7days = Order::whereBetween('created_at', [$startDate, $lastOrderDate])->get()->where('status', 'confirmed');

    dd($orders7days);

    }
}
