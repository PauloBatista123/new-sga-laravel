<?php

namespace App\Http\Livewire\Monitor;

use App\Jobs\ProcessChamarSenha;
use App\Models\Senhas;
use Carbon\Carbon;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = [
        'nova_senha_gerada' => 'render',
        'senhaChamadaMonitor' => 'render',
    ];

    public function render()
    {
        $senhas = Senhas::with(['tipoAtendimento', 'servico'])->where('status', 'AGUARDANDO')->orderBy('created_at', 'asc')->get();

        return view('livewire.monitor.index', [
            'senhas' => $senhas
        ]);
    }

    public function chamar(int $id)
    {
        $chamarSenha = Senhas::find($id);
        $chamarSenha->status = 'ATENDIMENTO';
        $chamarSenha->usuario_atendimento_id = Auth()->user()->id;
        $chamarSenha->inicio_atendimento = Carbon::now();
        $chamarSenha->save();

        ProcessChamarSenha::dispatch($chamarSenha);

    }
}
