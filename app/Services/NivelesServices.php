<?php
namespace App\Services;
use App\NivelesAcademico;
class NivelesServices
{
    public function get()
    {
        $nivelesAcas = NivelesAcademico::get();
        // $nivelesAcasArray[''] = 'Seleccione';
        foreach ($nivelesAcas as $nivelesAca) {
            $nivelesAcasArray[$nivelesAca->id] = $nivelesAca->descripcion;
        }
        // dd($estados);
        return $nivelesAcasArray;
        
    }
}