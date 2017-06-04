<?php

namespace Emeka\MO\Console\Commands;

use Emeka\MO\Console\Commands\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterFace;
use Symfony\Component\Console\Output\OutputInterFace;


class PendingRequest extends Command
{

	public function configure()
	{
		$this->setName('mo:pending')
			->setDescription('Displays all pending request in the database in a table form')
			->addOption('limit', null, InputOption::VALUE_REQUIRED, 'limit the number of records returned');
	}

	public function execute(InputInterFace $input, OutputInterFace $output)
	{
		$data = $this->moService->getRequestBy('status', 0)->get();

		if (!empty($input->getOption('limit'))) 
		{
			$data = $data->take($input->getOption('limit'));
		}

		$this->showResult($output, $data->toArray());
	}
}