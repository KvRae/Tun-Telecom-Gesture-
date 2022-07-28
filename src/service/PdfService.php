<?php

namespace App\service;

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
        //$pdfOptions->setIsHtml5ParserEnabled(true);
        $this->domPdf->setOptions($pdfOptions);



    }

    public function showPdfFile($html){
        $this->domPdf->loadHtml($html);
        $this->domPdf->render();
        ob_get_clean();
        $this->domPdf->stream('file.pdf',[
            'Attachment' =>false
        ]);

    }

    public function generateBinaryPDF($html){
        $this->domPdf->loadHtml($html);
        $this->domPdf->render();
        $this->domPdf->output($html);
    }
}
