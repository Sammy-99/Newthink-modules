<?php
 
namespace Bluethink\CustomCommand\Plugin;
 
use Magento\Framework\App\Config\ScopeConfigInterface;
 
class Invoice
{
     /**
     * Configuration barcode enable XML path
     */
    const XML_PATH_BARCODES_ENABLED = 'barcodes/general/eb_barcodes_active';
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;
    
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }
    
    public function beforeInsertDocumentNumber($subject, $page, $text)
    {
        if ($this->scopeConfig->isSetFlag(self::XML_PATH_BARCODES_ENABLED)) { //Here you will check your custom condition like enable/disable
            $docHeader = $subject->getDocHeaderCoordinates();
            $image = $this->generateBarcode($text);
            $page->drawImage($image, $docHeader[2] - 150, $docHeader[1] + 5, $docHeader[2] + 8, $docHeader[1] +50); //You will adjust barcode image place or height/width as per your requirement
        }
    }
 
    protected function generateBarcode($text)
    {
        $config = new \Zend_Config([
            'barcode' => 'code128',
            'barcodeParams' => [
                'text' => $this->extractInvoiceNumber($text),
                'drawText' => true
            ],
            'renderer' => 'image',
            'rendererParams' => ['imageType' => 'png']
        ]);
        $barcodeResource = \Zend\Barcode\Barcode::factory($config)->draw();
        ob_start();
        imagepng($barcodeResource);
        $barcodeImage = ob_get_clean();
        $image = new \Zend_Pdf_Resource_Image_Png('data:image/png;base64,' . base64_encode($barcodeImage));
        return $image;
    }
 
    protected function extractInvoiceNumber($text)
    {
        $array_of_words = explode("#", $text);
        return $array_of_words[1];
    }
}