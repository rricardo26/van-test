<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Comment\CommentRepositoryInterface;
use Illuminate\Support\Facades\Log;

class InsertRandomComment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:random-comment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert hourly a random comment in a random post';
    protected $postRepositoryInterface;
    protected $commentRepositoryInterface;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(PostRepositoryInterface $postRepositoryInterface,
                                CommentRepositoryInterface $commentRepositoryInterface)
    {
        parent::__construct();
        $this->postRepositoryInterface = $postRepositoryInterface;
        $this->commentRepositoryInterface = $commentRepositoryInterface;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $post = $this->postRepositoryInterface->getRandom();
            $comment = [
                'name' => 'J',
                'email' => 'J',
                'body' => 'J',
                'postId' => $post->id
            ];
            $this->commentRepositoryInterface->insert($comment);
            Log::info('Insert Comment Succesfully');
        } catch (\Exception $ex) {
            Log::error($ex);
        }
    }
}
