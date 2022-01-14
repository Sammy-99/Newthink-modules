<?php
namespace Bluethink\Grid\Controller;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Filesystem\DirectoryList;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Create extends Command
{
    public function __construct(
        \Magento\Framework\Filesystem $filesystem,
        \Magento\Customer\Model\CustomerFactory $customerFactory
    ) {
        $this->customerFactory = $customerFactory;
        $this->directory = $filesystem->getDirectoryWrite(DirectoryList::VAR_DIR);
        parent::__construct();
    }

   protected function configure()
   {
       $this->setName('create:customercsv');
       $this->setDescription('To create customer info csv file');
       
       parent::configure();
   }
   protected function execute(InputInterface $input, OutputInterface $output)
   {
    //    $output->writeln("This is customer command");

        $filepath = 'export/customerlist.csv';
        $this->directory->create('export');
        $stream = $this->directory->openFile($filepath, 'w+');
        $stream->lock();

        $header = ['Id', 'Name', 'Email'];
        $stream->writeCsv($header);

        $collection = $this->customerFactory->create()->getCollection();
        foreach ($collection as $customer) {
            $data = [];
            $data[] = $customer->getId();
            $data[] = $customer->getName();
            $data[] = $customer->getEmail();
            $stream->writeCsv($data);
        }

   }
}