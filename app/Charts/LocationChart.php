<?php

namespace App\Charts;

use App\Models\Product;
use ArielMejiaDev\LarapexCharts\AreaChart;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class LocationChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): AreaChart
    {
        // Ambil data produk berdasarkan lokasi
        $productLocations = Product::select('location', DB::raw('COUNT(*) as total'))
            ->groupBy('location')
            ->get();

        // Siapkan data untuk chart
        $labels = $productLocations->pluck('location')->toArray();
        $data = $productLocations->pluck('total')->toArray();

        // Buat area chart menggunakan LarapexCharts
        $areaChart = (new AreaChart)
            ->setTitle('Jumlah Produk per Lokasi')
            ->setSubtitle('Data berdasarkan lokasi produk')
            ->setXAxis($labels)
            ->addData('Jumlah Produk', $data);

        return $areaChart;
    }
}
