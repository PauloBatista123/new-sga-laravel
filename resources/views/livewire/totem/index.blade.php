<div class="container-totem">
    <div class="container-step">
        {{-- PASSO 1 --}}
        @if($this->currentStep === 0)

            <button class="btn btn-block btn-primary" wire:click="selectTypeCooperado(false)">NÃO COOPERADO</button>
            <button class="btn btn-block btn-primary" wire:click="selectTypeCooperado(true)">COOPERADO</button>

        @elseif($this->currentStep === 1)
            @foreach ($this->servicos as $servico)
            <button class="btn btn-block btn-primary" wire:click="selectTypeServico({{$servico->id}})">{{$servico->nome}}</button>
            @endforeach
        @elseif($this->currentStep === 2)
            @foreach ($this->atendimentos as $atendimento)
            <button class="btn btn-block btn-primary" wire:click="selectTypePrioridade({{$atendimento->id}})">{{$atendimento->nome}}</button>
            @endforeach
        @elseif($this->currentStep === 3)
            <div class="gerar-senha-container">
                <div class="gerar-senha-header">
                    <span>{{$this->newSenha->cooperado ? 'COOPERADO' : 'NÃO COOPERADO'}}</span>
                </div>
                <div class="gerar-senha-numero">
                    <strong>{{$this->newSenha->id}}</strong>
                </div>
                <div class="gerar-senha-servico">
                    <span>{{$this->newSenha->servico->nome}} - {{$this->newSenha->tipoAtendimento->nome}}</span>
                </div>
            </div>
            <script>
                setTimeout(() => {
                    window.livewire.emit('resetar');
                }, 5000);
            </script>
        @endif
    </div>
</div>
