<?php

declare(strict_types=1);

namespace OCA\RustFfi\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command {

	public function __construct() {
		parent::__construct('rust-ffi:test');
	}

	public function execute(InputInterface $input, OutputInterface $output) {
		if (!extension_loaded('ffi')) {
			$output->writeln('<error>php ffi extension missing</error>');
			return 1;
		}

		/** @var \FFI $def */
		$def = \FFI::cdef(
			"int32_t dob(int32_t n);",
			 __DIR__ . "/../../target/debug/librust_ffi.so"
		);

		$output->writeln($def->dob(3));

		return 0;
	}
}
