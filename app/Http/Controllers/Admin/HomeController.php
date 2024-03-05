<?php

namespace App\Http\Controllers\Admin;

use App\Charts\LocationChart;
use App\Charts\MonthlyPurchaseChart;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\InhousePayment;
use App\Models\Payments;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('is_admin');
    }
    public function index(MonthlyPurchaseChart $monthlyPurchaseChart, LocationChart $locationChart)
    {
        // count category
        $categories = ProductCategory::all();
        $categoryCount = $categories->count();

        // count property
        $properti = Product::all();
        $propertiCount = $properti->count();

        // count users
        $users = User::all();
        $usersCount = $users->count();

        // count inhouse payment
        $inhouse = InhousePayment::select('user_id')->distinct()->get();
        $inhouseCount = $inhouse->count();

        // count inhouse payment
        $payments = Payments::all();
        $paymentsCount = $payments->count();

        // // Panggil metode buildMonthlyPurchaseChart() dari objek chart yang telah Anda inisialisasi
        // Membuat objek chart dari class MonthlyPurchaseChart
        $monthlyPurchaseChartData = $monthlyPurchaseChart->build();

        $locationChartData = $locationChart->build();

        $usersWithApprovedPayments = User::whereHas('payments', function ($query) {
            $query->where('status', 'approved');
        })->orWhereHas('inhousePayments', function ($query) {
            $query->where('status', 'approved');
        })->get();

        $productsWithApprovedPayments = Product::whereHas('payments', function ($query) {
            $query->where('status', 'approved');
        })->orWhereHas('inhousePayments', function ($query) {
            $query->where('status', 'approved');
        })->get();

        $latestChats = Chat::select('chats.id', 'chats.user_id', 'chats.product_id', 'chats.admin_id', 'chats.message', 'chats.status', 'chats.created_at')
            ->join(DB::raw('(SELECT user_id, MAX(created_at) as max_created_at FROM chats GROUP BY user_id) as latest_chats'), function ($join) {
                $join->on('chats.user_id', '=', 'latest_chats.user_id')
                    ->on('chats.created_at', '=', 'latest_chats.max_created_at');
            })
            ->orderBy('chats.created_at', 'desc')
            ->get();

        return view('admin.home', compact('categoryCount', 'propertiCount', 'usersCount', 'inhouseCount', 'paymentsCount', 'monthlyPurchaseChartData', 'locationChartData', 'usersWithApprovedPayments', 'productsWithApprovedPayments', 'latestChats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
