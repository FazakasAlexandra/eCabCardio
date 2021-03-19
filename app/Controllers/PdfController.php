<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\MedicalLetterModel;
use App\Models\ConsultsExaminationsModel;
use App\Models\ConsultsAnalysisModel;
use Dompdf\Dompdf;

class PdfController extends Controller
{
    public function index()
    {
        return view('pdf_view');
    }

    function htmlToPDF($consultId)
    {
        $medicalLetterModel = new MedicalLetterModel();
		$consultsAnalysisModel = new ConsultsAnalysisModel();
        $consultsExaminationsModel = new ConsultsExaminationsModel();
        
        $medicalLetter = $medicalLetterModel->getMedicalLetter($consultId);
        $medicalLetter->examinations = $consultsExaminationsModel->getExaminations($consultId);
        $medicalLetter->analysis = $consultsAnalysisModel->getAnalysis($consultId);

        $dompdf = new Dompdf();
        $dompdf->getOptions()->setChroot('/wamp64/www/ecabcardio/public');
        $dompdf->loadHtml(view('templates/medical_letter_pdf.php', ['medical_letter' => $medicalLetter]));
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream();
    }

    function receipHTMLtoPDF(){

    }
}
