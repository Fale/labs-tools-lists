<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class WeeklyCrontab extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'crontab:weekly';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Weekly crontab of the project';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		$queries = Query::where('frequency', 'weekly')->get();
		foreach ($queries as $query) {
			shell_exec('php artisan crontab:exec ' . $query['name']);
		}

	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array();
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array();
	}

}