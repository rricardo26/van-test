<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\Post\PostRepositoryInterface;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

class InsertPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for insert all the posts';
    protected $postRepositoryInterface;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(PostRepositoryInterface $postRepositoryInterface)
    {
        parent::__construct();
        $this->postRepositoryInterface = $postRepositoryInterface;
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
            $response = $client->get('posts');
            $data = $response->getBody()->getContents();
            $this->postRepositoryInterface->insertAll(json_decode($data, true));
            Log::info('Insert Succesfully');
        } catch (\Exception $ex) {
            Log::error($ex);
        }
    }
}
