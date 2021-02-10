<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Box\Spout\Common\Type;
use Box\Spout\Writer\Style\Border;
use Box\Spout\Writer\Style\BorderBuilder;
use Box\Spout\Writer\Style\Color;
use Box\Spout\Writer\Style\StyleBuilder;
use Box\Spout\Writer\WriterFactory;
use PDF;
use App\Models\Report;
use \Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id,$type,$format)
    {
        $report = new Report();
         ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
          $pdf = app('dompdf.wrapper');
            $customPaper = array(15, -20, 600, 227);
            $data=$report->dataactivity($id);
            //dd($data);

            //dd(DB::select("select *  FROM activity "));
  //$view = \View::make('notacredito.pdf', compact('cabecera', 'detalles', 'numeroLtras'))->render();
          $pdf = \PDF::loadView('activity_pdf' ,compact('data'));
        return $pdf->download('activity_pdf.pdf');
            //$pdf->loadView('report.activity_pdf', compact('data'))->setPaper($customPaper, 'landscape');
            //return $pdf->download('formato.pdf');
    }

    
}

/**

  ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
          $pdf = app('dompdf.wrapper');
    $pdf->loadHTML('<h1>Styde.net</h1>');

    return $pdf->download('mi-archivo.pdf');

*/