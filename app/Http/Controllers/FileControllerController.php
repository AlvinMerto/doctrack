<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;

class FileControllerController extends Controller
{
    //
    function display() {
        return "hello world from file controller";
    }

    function uploadfile(Request $req, $barcode) {
        // $req->validate([

        // ]);

        $file     = $req->file("thefile");
        $old      = $file->getClientOriginalName();
        
        $name     = date("mdy_hisA")."_".$file->getClientOriginalName();
        $filepath = $file->storeAs( 'public\attachments', $name);

       // shell_exec( "gswin32 -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dNOPAUSE -dQUIET -dBATCH -sOutputFile=".$filepath." ".$old.""); 

        $pdf      = new Fpdi();

        $text     = $barcode;
        $pdf->AddPage();
        $pdf->setSourceFile( storage_path("app\public\public\attachments\/".$name) );
        // $pdf->setSourceFile( storage_path("app\private\public\attachments\/".$name) ); //public_path("ORCR-MERTO.pdf")
        $tplId    = $pdf->importPage(1);
        $size     = $pdf->getTemplateSize($tplId);
        $pdf->useTemplate($tplId, 0, 0, $size['width']);
        $pdf->SetFont('Helvetica');
        $pdf->SetFillColor(0,0,0);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell((($pdf->GetStringWidth($text))+4),10,$text,0,2,'L', TRUE);
        
        $pdf->Output( storage_path("app\public\public\attachments\/".$name) ,'F');
        // $pdf->Output( storage_path("app\public\attachments\/".$name) ,'F');

        return ["name"=>$name,"path"=>$filepath];
    }
}
