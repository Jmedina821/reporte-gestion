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
	ini_set('max_execution_time', 0);
        ini_set('memory_limit', '-1');
        $report = new Report();

        switch ($type) {
          case 'activity':
          $pdf = app('dompdf.wrapper');
          $customPaper = array(15, -20, 600, 227);
          $data=$report->dataactivity($id);
          dd($data);
          $pdf = \PDF::loadView('activity_pdf' ,compact('data'));

          return $pdf->download('activity.pdf');
          break;
          case 'project':
          $pdf = app('dompdf.wrapper');
          $customPaper = array(15, -20, 600, 227);
         // dd($id);
	$data=$report->dataproject($id);
        // dd($data);
          $activity=$report->dataaallctivityproject($data[0]->project_id_proj);
          //dd($activity);
          $pdf = \PDF::loadView('project_pdf' ,compact('data','activity'));
          return $pdf->download('project.pdf');

          break;

          default:
          break;
        }
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
