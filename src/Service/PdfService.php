<?php

namespace App\Service;

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfService
{
    private $domPdf;

    public function __construct(){

        $pdfOptions = new Options();
        $this->domPdf = new Dompdf();
        $this->domPdf->setPaper('A4', 'portrait');
        $pdfOptions->isRemoteEnabled(true);
        $pdfOptions->setChroot(["/assets/img/"]);
        $pdfOptions->setTempDir('/public/assets/');
        $pdfOptions->setIsHtml5ParserEnabled(true);
        $this->domPdf->setOptions($pdfOptions);;
        //$dompdf = new Dompdf($pdfOptions);
    }

    public function showPdfFile($html){
        $this->domPdf->loadHtml($html);
        $this->domPdf->render();
        ob_get_clean();
        $this->domPdf->stream('service.pdf',[
            'Attachment' =>false
        ]);
        //$this->domPdf->output($html);

    }
    public function generateBinaryPDF($html){
        $this->domPdf->loadHtml($html);
        $this->domPdf->render();
        $this->domPdf->output($html);
    }
}
