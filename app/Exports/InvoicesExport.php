<?php

namespace App\Exports;

use App\Estado;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InvoicesExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('admin.reportes.showListCenter', [
            'estados' => Estado::all()
        ]);
    }
}
