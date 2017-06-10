<?php

namespace Emeka\MO\Console\Commands\Database;

use Emeka\Database\Schemes;
use Emeka\MO\Console\Commands\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterFace;
use Symfony\Component\Console\Output\OutputInterFace;

class RunMigrations extends Command
{
	/**
	* command configure
	*/
	public function configure()
	{
		$this->setName('mo:migrate')
			->setDescription('Create database migration');
	}

	/**
	* command execute
	*/
	public function execute(InputInterFace $input, OutputInterFace $output)
	{
		$database = new Schemes;

        $output->writeln(array(
	        '<info> Mo ' . $database->createRequestTable() . '</>',
	        '<info> ===============</>',
        ));
	}
}