<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListenWebsockets extends Component
{

    public $mensagem;
    public $user;

    public function render()
    {
        return view('livewire.listen-websockets');
    }

    public function getListeners()
    {
        return [
            "notify" => "notify"
        ];
    }

    public function notify($event)
    {
        $this->mensagem = $event['message'];
        $this->user = $event['user']['name'];
    }
}
