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
        $pdfOptions->setChroot(["/public/assets"]);
        $pdfOptions->setTempDir('/public/assets/');
        $pdfOptions->setIsHtml5ParserEnabled(true);
        $this->domPdf->setOptions($pdfOptions);;
        $dompdf = new Dompdf($pdfOptions);
        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                'allow_self_signed' => TRUE
            ]
        ]);
        $dompdf->setHttpContext($context);
    }

    public function showPdfFile($html){
        $this->domPdf->loadHtml($html);
        $this->domPdf->render();
        ob_get_clean();
        $this->domPdf->stream('file.pdf',[
            'Attachment' =>true
        ]);

    }
    public function generateBinaryPDF($html){
        $this->domPdf->loadHtml($html);
        $this->domPdf->render();
        $this->domPdf->output($html);
    }
}
