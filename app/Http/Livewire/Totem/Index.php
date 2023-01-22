<?php

namespace App\Http\Livewire\Totem;

use App\Events\NovaSenhaEvent;
use App\Models\Senhas;
use App\Models\Servico;
use App\Models\TipoAtendimento;
use Livewire\Component;

class Index extends Component
{

    public int $currentStep = 0;
    public bool $isCooperado = false;
    public string $tipoServico = '';
    public string $tipoAtendimento = '';
    public bool $finished = false;
    public Senhas $newSenha;

    const SIGLA_CAIXA = 'CX';
    const SIGLA_ATENDIMENTO = 'AT';
    const SIGLA_GERENCIA = 'GR';

    // SERVIÇOS
    public $servicos;
    public $atendimentos;

    protected $listeners = [
        'resetar' => 'resetar'
    ];

    public function render()
    {
        return view('livewire.totem.index');
    }

    public function mount()
    {
        $this->servicos = Servico::where('status', 0)->orderBy('nome')->get();
        $this->atendimentos = TipoAtendimento::where('status', 0)->orderBy('nome')->get();
    }

    public function selectTypeCooperado($type)
    {
        $this->isCooperado = $type;
        $this->currentStep = 1;
    }

    public function selectTypeServico($type)
    {
        $this->tipoServico = $type;
        $this->currentStep = 2;
    }

    public function selectTypePrioridade($type)
    {
        $this->tipoAtendimento = $type;
        $this->currentStep = 3;

        $this->salvarSenha();
    }

    public function salvarSenha()
    {
        $this->newSenha = new Senhas();
        $this->newSenha->tipo_atendimento_id = $this->tipoAtendimento;
        $this->newSenha->servico_id = $this->tipoServico;
        $this->newSenha->cooperado = $this->isCooperado;
        $this->newSenha->status = 'AGUARDANDO';
        $this->newSenha->save();

        $this->finished = true;

        event(new NovaSenhaEvent($this->newSenha));
    }

    public function resetar()
    {
        $this->reset(['currentStep', 'isCooperado', 'tipoServico' , 'tipoAtendimento', 'finished']);
    }

}
