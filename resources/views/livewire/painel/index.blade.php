<div>
    <div class="grid-container">
        <div class="container-historico">
            @foreach ($historico as $item)
                <div class="senha-container">
                    <div class="senha-header">
                        {{$item->id}}
                    </div>
                    <div class="senha-content">
                        {{$item->tipoAtendimento->nome}}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="container-video">
            video
        </div>
    </div>
   <div class="footer">
        footer
   </div>

   {{-- modal --}}

   <div class="modal fade" id="modalSenhaShow" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" style="display: block;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        @if($this->chamada)
        <div class="modal-body">
          <div>
            <h1>{{$this->chamada->id}}</h1>
          </div>
          <div>
            <strong>{{$this->chamada->tipoAtendimento->nome}}</strong>
          </div>
          <div>
            <span>{{$this->chamada->servico->nome}}</span>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>

   {{-- modal --}}

</div>
