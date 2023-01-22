<?php

namespace App\Http\Livewire\Painel;

use App\Models\Senhas;
use Livewire\Component;

class Index extends Component
{

    protected $listeners = [
        'senhaChamadaPainel' => 'handleSenhaChamada'
    ];

    public $chamada;

    public function render()
    {
        $historico = Senhas::whereIn('status', ['FINALIZADO', 'ATENDIMENTO'])->orderBy('id','desc')->take(4)->get();

        return view('livewire.painel.index', [
            'historico' => $historico
        ]);
    }

    public function handleSenhaChamada($event)
    {
        $this->chamada = Senhas::find($event['senha']['id']);
    }

}
