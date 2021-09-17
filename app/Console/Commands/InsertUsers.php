<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class InsertUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for insert all the users in DB';
    protected $userRepositoryInterface;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {
        parent::__construct();
        $this->userRepositoryInterface = $userRepositoryInterface;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $client = new Client(['base_uri' => 'https://jsonplaceholder.typicode.com/']);
            $response = $client->get('users');
            $data = $response->getBody()->getContents();
            $this->userRepositoryInterface->insertAll(json_decode($data, true));
            Log::info('Insert Succesfully');
        } catch (\Exception $ex) {
            Log::error($ex);
        }
    }
}
