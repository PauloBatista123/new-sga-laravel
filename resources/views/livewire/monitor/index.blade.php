<div>
    <ul>
        @foreach ($senhas as $item)
            <li>
                {{$item->id}} - {{$item->tipoAtendimento->nome}} - {{$item->servico->nome}} - <button wire:click='chamar({{$item->id}})' class="btn btn-primary">Chamar</button>
            </li>
        @endforeach
    </ul>
</div>
