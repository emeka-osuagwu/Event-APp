<?php

namespace Emeka\MO\Console\Commands;

use Emeka\MO\Console\Commands\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterFace;
use Symfony\Component\Console\Output\OutputInterFace;

class DeletePendingRequest extends Command
{
	/**
	* command configure
	*/
	public function configure()
	{
		$this->setName('mo:delete-pending')
			->setDescription('Delete all pending request from the database')
			->addOption('limit', null, InputOption::VALUE_REQUIRED, 'limit the number of records returned');
	}

	/**
	* command execute
	*/
	public function execute(InputInterFace $input, OutputInterFace $output)
	{
		$this->moService->getRequestBy('status', 0)->delete();
		$data = $this->moService->getAllRequest();

		$this->showResult($output, $data->toArray());
	}
}