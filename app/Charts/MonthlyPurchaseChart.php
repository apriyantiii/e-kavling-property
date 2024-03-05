<?php

namespace App\Charts;

use App\Models\InhousePayment;
use App\Models\Payments;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use ArielMejiaDev\LarapexCharts\LineChart;
use Carbon\Carbon;

class MonthlyPurchaseChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    // public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    // {
    //     return $this->chart->lineChart()
    //         ->setTitle('Sales during 2021.')
    //         ->setSubtitle('Physical sales vs Digital sales.')
    //         ->addData('Physical sales', [40, 93, 35, 42, 18, 82])
    //         ->addData('Digital sales', [70, 29, 77, 28, 55, 45])
    //         ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    // }

    public function build(): LineChart
    {
        // Ambil data dari tabel payments
        $paymentsData = Payments::selectRaw('DATE_FORMAT(payment_date, "%Y-%m") as date, COUNT(*) as total_amount')
            ->groupBy('date')
            ->get();

        $payments = $paymentsData->pluck('total_amount')->toArray();

        // Ambil data dari tabel inhouse_payments
        $inhousePaymentsData = InhousePayment::selectRaw('DATE_FORMAT(payment_date, "%Y-%m") as date, COUNT(*) as total_nominal')
            ->groupBy('date')
            ->get();

        $inhousePayments = $inhousePaymentsData->pluck('total_nominal')->toArray();

        // Siapkan data untuk chart
        $labels = [];

        // Format tanggal dari hasil query dan tambahkan ke dalam array label
        foreach ($paymentsData as $payment) {
            // Ubah format tanggal menjadi "bulan tahun" menggunakan Carbon atau PHP date
            $formattedDate = Carbon::createFromFormat('Y-m', $payment->date)->format('F Y');
            // Tambahkan tanggal yang diformat ke dalam array label
            $labels[] = $formattedDate;
        }


        // Buat chart menggunakan LarapexCharts
        return (new LineChart)
            ->setTitle('Data Penjualan.')
            ->setSubtitle('Pembayaran Cash/KPR vs Pembayaran Inhouse.')
            ->addData('Pembayaran Cash/KPR', $payments)
            ->addData('Pembayaran Inhouse', $inhousePayments)
            ->setXAxis($labels);
    }
}
