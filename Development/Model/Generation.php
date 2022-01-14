<?php
namespace Bluethink\Development\Model;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Customer\Model\CustomerFactory;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\Response\Http\FileFactory;
use Magento\Framework\Filesystem;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Sales\Model\Order\ItemFactory;

class Generation extends Command
{
    
     protected $_fileFactory;
    
     


     public function __construct(
        CustomerFactory $customer,
        FileFactory $fileFactory,
        Filesystem $filesystem,
        ScopeConfigInterface $scopeConfig,
        ItemFactory $itemFactory,
        $name = null
       )
      {   
        parent::__construct($name);
        $this->customerFactory = $customer;
        $this->_fileFactory = $fileFactory;
        $this->directory = $filesystem->getDirectoryWrite(DirectoryList::VAR_DIR);
        $this->scopeConfig = $scopeConfig;
        $this->itemFactory =$itemFactory;
       
        }

   protected function configure()
    {
        $this->setName('generation:clean')
             ->setDescription('The description of you command here!');
        
        parent::configure();
    }
    
     protected function execute(InputInterface $input, OutputInterface $output)
    {
         
    $condition = $this->scopeConfig->getValue('bluethink/general/bluethink_dev_enabled', 
    \Magento\Store\Model\ScopeInterface::SCOPE_STORE);

    
    $startdate=$this->scopeConfig->getValue('bluethink/datepicker1/startdate',\Magento\Store\Model\ScopeInterface::SCOPE_STORE);

    
    $enddate=$this->scopeConfig->getValue('bluethink/datepicker1/enddate',
        \Magento\Store\Model\ScopeInterface::SCOPE_STORE);


        if($condition)
        {
        $date=date('h:i:s');
        $filepath = 'export/dev1'.$date.'.csv';
        $this->directory->create('export');
        $stream = $this->directory->openFile($filepath, 'w+');
        $stream->lock();

        $header = ['Item Id', 'Product Name', 'Price','SKU' ,'Created at'];
        $stream->writeCsv($header);

        // $collection = $this->customerFactory->create()->getCollection();

        $collection = $this->itemFactory->create()->getCollection();
        
        $order = $collection->addAttributeToFilter('created_at', array(
        'from' => $startdate,
        'to' => $enddate,
        'date' => true,
          ));
        
        if($order)
        {
        foreach ($order as $item) 
        {

            $data = [];
            $data[] = $item->getItemId();
            $data[] = $item->getName();
            $data[] = $item->getPrice();
            $data[] = $item->getSku();
            $data[] = $item->getCreated_at();
            $stream->writeCsv($data);
        }
        $output->writeln('Succss ! Your File is downloading');
        }
        else
        {
        $output->writeln('Attention! sheet  is blanked');
        }
    }
    

    else
    {
        $output->writeln('Sorry ! we are able to download this file');
    }
    }
       

}






 // $fs = new Filesystem();
 //          try {
 //            if($fs->exists('var/tmp')){
 //                $fs->remove(array('var/tmp'));
 //                $output->writeln('Cleared generation!');
 //              }
 //            else 
 //              {
 //             $output->writeln('Can\'t find directory');
 //              }
 //             } 
 //        catch (IOExceptionInterface $e) 
 //              {
 //            echo "An error occurred while deleting your directory at ".$e->getPath();
 //              }







  // $customerCollection = $this->_customerFactory->create();
  //           $collection = $customerCollection->getCollection()
  //           ->addAttributeToSelect("*")
  //           ->load();
                    
  //       $name = date('m_d_Y_H_i_s');
  //       $filepath = 'export/custom' . $name . '.csv';
  //       $this->directory->create('export');
  //       /* Open file */
  //       $stream = $this->directory->openFile($filepath, 'w+');
  //       $stream->lock();
  //       $columns = $this->getColumnHeader();
  //       foreach ($columns as $column)
  //       {
  //           $header[] = $column;
  //       }
  //       /* Write Header */
  //       $stream->writeCsv($header);

  //       $products[] = array(1,'Test 1','test 1',100);
  //       $products[] = array(2,'Test 2','test 2',299);
           
  //       foreach ($products as $item)
  //       {
  //           $itemData = [];
  //           $itemData[] = $item[0];
  //           $itemData[] = $item[1];
  //           $itemData[] = $item[2];
  //           $itemData[] = $item[3];
  //           $stream->writeCsv($itemData);
  //       }

  //       $content = [];
  //       $content['type'] = 'filename'; // must keep filename
  //       $content['value'] = $filepath;
  //       $content['rm'] = '1'; //remove csv from var folder

  //       $csvfilename = 'Product.csv';

  //        return $this->_fileFactory->create($csvfilename, $content, DirectoryList::VAR_DIR);
            
   //   /* Header Columns */
        
  //       public function getColumnHeader()
  //        {
  //       $headers = ['Id','Product name','SKU','Price'];
  //          return $headers;
  //       }
         
       
