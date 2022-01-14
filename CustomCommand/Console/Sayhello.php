<?php
namespace Bluethink\CustomCommand\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

class Sayhello extends Command
{
    const NAME = 'name';
    const DESCRIPTION = 'desc';

    protected $description;

    protected function configure()
    {
        $this->description = 'It is just custom command for testing';
        $options = [
			new InputOption(
				self::NAME,
				null,
				InputOption::VALUE_REQUIRED,
				'Name'
            ),
            new InputOption(
				self::DESCRIPTION,
				null,
				InputOption::VALUE_NONE,
				'Description'
			)
		];

        $this->setName('custom:demo')->setDescription($this->description)->setDefinition($options);
       
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if ($name = $input->getOption(self::NAME)){
            $output->writeln("<info>Hello, ".$name." your custom command is working</info>");

        }elseif($desc = $input->getOption(self::DESCRIPTION)){    
                $output->writeln("<info>".$this->description."</info>");   
                  
        }else{
            $output->writeln("<info>Hello, your custom command is working</info>");
        }

        return $this;
    }
}