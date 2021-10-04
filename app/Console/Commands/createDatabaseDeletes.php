<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PDO;
use Artisan;

class createDatabaseDeletes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'createDatabaseDeletes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para crear la base de datos de _deletes y ejecutar la migración correspondiente';

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
        $database = env('DB_DATABASE', 'ecommerce').'_deletes';
        $host = env('DB_HOST', '127.0.0.1');
        $username = env('DB_USERNAME', 'root');
        $port = env('DB_PORT', '3306');
        $password = env('DB_PASSWORD', null);

        try{
            //Get PDO connection -> Return PDO
            $pdo = new PDO( sprintf('mysql:host=%s;port=%d;', $host, $port ) , $username, $password );

            $pdo->exec(sprintf(
                'CREATE DATABASE IF NOT EXISTS `%s` CHARACTER SET %s COLLATE %s;',
                $database,
                env('DATABASE_CHARSET','utf8mb4'),
                env('DATABASE_COLLATION','utf8mb4_unicode_ci')
            ));

        } catch (PDOException $exception) {
            return 'Error al crear la base de datos: '.$exception->getMessage();
        }

        Artisan::call('migrate', array('--database' => 'mysql_delete' , '--path' => 'database/migrations/deletes/2021_06_21_163227_create_table_deletes.php', '--force' => true));
    }
}
