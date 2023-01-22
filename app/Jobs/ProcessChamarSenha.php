<?php

namespace App\Jobs;

use App\Events\ChamarSenhaEvent;
use App\Jobs\Middleware\RateLimited;
use App\Models\Senhas;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;

class ProcessChamarSenha implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Senhas $senha;

    public $timeout = 3600;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Senhas $senha)
    {
        $this->senha = $senha;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        event(new ChamarSenhaEvent($this->senha));
    }

}
