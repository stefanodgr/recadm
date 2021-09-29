<?php

namespace App\Exports;

use App\Reporte;
use App\Estado;               //IMPORTANTE NOMBRE DE LA CLASE
use App\Person;               //IMPORTANTE NOMBRE DE LA CLASE
use App\Municipio;               //IMPORTANTE NOMBRE DE LA CLASE
use App\Parroquia;               //IMPORTANTE NOMBRE DE LA CLASE
use App\Centervote;               //IMPORTANTE NOMBRE DE LA CLASE
use App\Division;
use App\Position;
use App\Personvote;
use App\Personstructure;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReporteExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Estado::all();
    }
}
