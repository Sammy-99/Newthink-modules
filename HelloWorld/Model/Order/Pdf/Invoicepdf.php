<?php
namespace Bluethink\HelloWorld\Model\Order\Pdf;

use PHPQRCode\QRcode;

class Invoicepdf extends \Magento\Sales\Model\Order\Pdf\Invoice{
    public function getPdf($invoices = [])
       {       
           //custom code of getpdf

               //add new footer section this is our custom code function...
               $this->_drawFooter($page);   

            $this->_afterGetPdf();
            return $pdf;
       }

       protected function _drawFooter(\Zend_Pdf_Page $page)
       {
           $this->y =50;    
           $page->setFillColor(new \Zend_Pdf_Color_RGB(1, 1, 1));
           $page->setLineColor(new \Zend_Pdf_Color_GrayScale(0.5));
           $page->setLineWidth(0.5);
           $page->drawRectangle(60, $this->y, 510, $this->y -30);

           $page->setFillColor(new \Zend_Pdf_Color_RGB(0.1, 0.1, 0.1));
           $page->setFont(\Zend_Pdf_Font::fontWithName(\Zend_Pdf_Font::FONT_HELVETICA), 7);
           $this->y -=10;
           $page->drawText("Company name", 70, $this->y, 'UTF-8');
           $page->drawText("Tel: +123 456 676", 230, $this->y, 'UTF-8');
           $page->drawText("Registered in Countryname", 430, $this->y, 'UTF-8');

       }
}