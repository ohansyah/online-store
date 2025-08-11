<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Arr;
use Spatie\Browsershot\Browsershot;

class OrderExportController extends Controller
{
    protected function getCompanySettings()
    {
        $settings = cache('general_settings');
        return Arr::only($settings, ['company_name', 'company_address_line_1', 'company_address_line_2']);
    }

    protected function getTotalHeight($itemCount) : int
    {
        $baseHeight = 200; // header/footer
        $itemHeight = 25; // per item
        return $baseHeight + ($itemCount * $itemHeight);
    }

    public function print(Order $order)
    {
        $company = $this->getCompanySettings();
        return view('orders.export.print', compact('order', 'company'));
    }

    public function downloadPdf(Order $order)
    {
        $totalHeight = $this->getTotalHeight($order->orderProducts->count());

        $company = $this->getCompanySettings();
        $pdf = Pdf::loadView('orders.export.pdf', compact('order', 'company'))
            ->setPaper([0, 0, 300, $totalHeight]) // [x, y, width, height] in points (1pt = 1/72 inch)
            ->setOption('isHtml5ParserEnabled', true)
            ->setOption('isPhpEnabled', true);

        return $pdf->download("{$order->invoice_number}.pdf");
    }

    public function downloadImage(Order $order)
    {
        $totalHeight = $this->getTotalHeight($order->orderProducts->count());

        $company = $this->getCompanySettings();
        $html = view('orders.export.image', compact('order', 'company'))->render();

        $filename = "{$order->invoice_number}.png";
        $path = storage_path("app/public/$filename");

        Browsershot::html($html)
            ->windowSize(300, $totalHeight) // width (for 58mm printer), height is flexible
            ->fullPage()
            ->noSandbox()
            ->waitUntilNetworkIdle()
            ->save($path);

        return response()->download($path)->deleteFileAfterSend();
    }
}
