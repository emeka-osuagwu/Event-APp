<?php

namespace Emeka\MO\Console\Commands;

use Emeka\MO\Services\MOService;
use Illuminate\Database\Query\Builder;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Command\Command as SymfonyCommand;

class Command extends SymfonyCommand
{
	protected $moService;

	/**
	* Creates an instance of Command
	*/
	function __construct()
	{
		$this->moService = new MOService;
		parent::__construct();
	}

	/**
	* Command showResult
	*/
	public function showResult($output, $data)
	{
		$table = new Table($output);

		$table->setHeaders(['id', 'msisdn', 'operatorid', 'shortcodeid', 'text', 'status', 'created_at', 'updated_at'])
			->setRows($data)
			->render();
	}

	/**
	* Command showStatus
	*/
	public function showStatus($output, $data)
	{
		$table = new Table($output);

		$table->setHeaders(['pending', 'processed',])
			->setRows($data)
			->render();
	}
}