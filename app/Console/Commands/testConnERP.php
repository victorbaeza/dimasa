<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class testConnERP extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:testConnERP';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        // return 0;
        $clientes_erp = DB::connection('mysql_erp')->select('SELECT * FROM clientes');

        foreach ($clientes_erp as $cliente_erp)
        {
            dd($cliente_erp);
        }
    }
}
