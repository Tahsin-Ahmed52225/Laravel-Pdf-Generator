<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Datainfo;

use Dompdf\Dompdf;

use Dompdf\Options;

use \PDF;

class datacontroller extends Controller
{
    public function adddata(Request $req)
    {
        if ($req->isMethod("POST")) {
            $data = Datainfo::create([
                'Student_name' => $req->name,
                'Student_email' => $req->mail,
                'Department' => $req->department,
                'Student_id' => $req->id,
            ]);
        } else {
            return route("home");
        }
    }
    public function printpdf()
    {
        $data = Datainfo::all();

        // $dompdf = new Dompdf();
        $pdf = PDF::loadView('pdf', compact('data'));
        // $dompdf->setPaper('A4', 'landscape');

        // // Render the HTML as PDF
        // $dompdf->render();

        // Output the generated PDF to Browser
        return $pdf->stream('data.pdf');
        // return  $pdf->download('data.pdf', array('Attachment' => 0));
    }
}
