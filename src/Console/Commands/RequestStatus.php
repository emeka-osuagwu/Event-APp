<?php

namespace Emeka\MO\Console\Commands;

use Carbon\Carbon;
use Emeka\MO\Console\Commands\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterFace;
use Symfony\Component\Console\Output\OutputInterFace;

class RequestStatus extends Command
{

	/**
	* command configure
	*/
	public function configure()
	{
		$this->setName('mo:status')
			->setDescription('Display all request status in database')
			->addOption('from', null, InputOption::VALUE_REQUIRED, 'select particular period you want to show e.g [--from today, --from 1 month]');
	}

	/**
	* command execute
	*/
	public function execute(InputInterFace $input, OutputInterFace $output)
	{
		$pending = $this->moService->getRequestBy('status', 0)->get()->count();
		$processed = $this->moService->getRequestBy('status', 1)->get()->count();

		$pre_data = [
			'pending' => $pending,
			'processed' => $processed
		];

		$this->showStatus($output, [$pre_data]);
	}
}