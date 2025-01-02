<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EntrycontrolController;
use App\Http\Controllers\TheDocumentController;
use App\Http\Controllers\ExternalDocsController;

use Illuminate\Support\Facades\Route;

use setasign\Fpdi\Fpdi;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

Route::get('/', function () {
    // phpinfo();
    // return view('welcome');

    if (Auth::id()) {
        return redirect()->route("dashboard");
    }

    return redirect()->route("login");
});

Route::get("/testcont", [EntrycontrolController::class,"testcont"])->name('testcont');

Route::get('/pdf', function (Codedge\Fpdf\Fpdf\Fpdf $fpdf) {
    // $qrCode = QrCode::format("png")->size(300)->generate('Hello, Laravel 11!');
    
    // $qr     = base64_encode($qrCode);
    // return $qr;
    
    $pdf = new Fpdi();

    $text = "2349-234-234-234";
    $pdf->AddPage();
    $pdf->setSourceFile( public_path("ORCR-MERTO.pdf")  );
    $tplId = $pdf->importPage(1);
    $size  = $pdf->getTemplateSize($tplId);
    $pdf->useTemplate($tplId, 0, 0, $size['width']);
    $pdf->SetFont('Helvetica');
    $pdf->SetFillColor(0,0,0);
    $pdf->SetTextColor(255,255,255);
    // $pdf->setX(170);
    $pdf->Cell((($pdf->GetStringWidth($text))+4),10,$text,0,2,'L', TRUE);
    // $pdf->Write(0, "sample text here 48534-345-345-3453");
    // $pdf->Image($qr, 10, $size['height']-30, 30);
    $pdf->Output(); 
    exit;
});

Route::get("/email", function(){
    Mail::raw('This email confirms that everything was set up correctly!', function ($message) { 
        $message->to('merto.alvinjay@gmail.com') 
        ->subject('Testing Laravel + Mailgun'); 
        }); 
});

// return view('dashboard');
Route::get('/dashboard', [TheDocumentController::class,"dashboard"])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get("/entry",[EntrycontrolController::class,"entry"])->name("entrycontro.entry");
    Route::post("/entry",[EntrycontrolController::class,"postentry"])->name("postentry");

    Route::get("/completed",[TheDocumentController::class,"completed"])->name("completed");

    // ajax calls
        Route::post('/getdocs', [TheDocumentController::class,"getdocs"])->name('getdocs');
        Route::get("/forwarddocs",[TheDocumentController::class,"forwarddocs"])->name('forwarddocs');
        Route::post("/forwarddocs",[TheDocumentController::class,"postforward"])->name('postforward');
        Route::get("/display_data",[TheDocumentController::class,"display_data"])->name('display_data');

        Route::get("/docdetails",[TheDocumentController::class,"docdetails"])->name('docdetails');
        Route::get("/dochistory",[TheDocumentController::class,"dochistory"])->name('dochistory');
        Route::get("/docforward",[TheDocumentController::class,"docforward"])->name('docforward');
        Route::get("/getpersonnel",[TheDocumentController::class,"getpersonnel"])->name('getpersonnel');
        Route::post("/completeroute",[TheDocumentController::class,"completeroute"])->name("completeroute");

        Route::post("/provideupdate",[TheDocumentController::class,"provideupdate"])->name('provideupdate');

        Route::post("/autoupload",[EntrycontrolController::class,"autoupload"])->name("autoupload");
    // end
});

// Route::get("/tracking/{trackingid?}", [ExternalDocsController::class,"tracking"])->name("tracking");
Route::get("/tracking/start", [EntrycontrolController::class,"enter_externaldocs"])->name("enter_externaldocs");
Route::get("/tracking", [ExternalDocsController::class,"entrytracking"])->name("entrytracking");
Route::post("/tracking", [ExternalDocsController::class,"tracking"])->name("tracking");

require __DIR__.'/auth.php';
