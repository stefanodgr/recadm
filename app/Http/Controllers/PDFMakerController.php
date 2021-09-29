<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Person;                //IMPORTANTE NOMBRE DE LA CLASE 
class PDFMakerController extends Controller
{
    //

     /* AUTENTICADOR DE SESSION */
     public function __construct(){

        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @param  Centervote  $centervote
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    //     $pdf = Person::loadView('dompdf.wrapper');
       
    //   return $pdf->stream();
    // }

    public function export_pdf()
    {
      // Fetch all customers from database
      $data = Person::get();
      // Send data to the view using loadView function of PDF facade
      $pdf = \PDF::loadView('persons.showpdf', $data);
      // If you want to store the generated pdf to the server then you can use the store function
      $pdf->save(storage_path().'_filename.pdf');
      // Finally, you can download the file using download function
      return $pdf->download('persons.showpdf');
    }
}
