<?php

namespace App\service;

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfService
{
    private $domPdf;

    public function __construct(){
        $this->domPdf = new Dompdf();

        $pdfOptions = new Options();
        $this->domPdf->setPaper('A4', 'portrait');
        $pdfOptions->set('defaultFont','Arial');
        $pdfOptions->setIsHtml5ParserEnabled(true);
        $this->domPdf->setOptions($pdfOptions);

    }

    public function showPdfFile($html){
        $this->domPdf->loadHtml($html);
        $this->domPdf->render();
        $this->domPdf->stream('fichier.pdf',[
            'Attachment' =>false
        ]);

    }

    public function generateBinaryPDF($html){
        $this->domPdf->loadHtml($html);
        $this->domPdf->render();
        $this->domPdf->output($html);
    }
}
