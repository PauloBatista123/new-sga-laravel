<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Senhas extends Model
{
    use HasFactory;

    /**
     *  Pegar relacionamentos de tipo_atendimentos
     */

     public function tipoAtendimento()
     {
        return $this->belongsTo(TipoAtendimento::class, 'tipo_atendimento_id', 'id');
     }

     /**
     *  Pegar relacionamentos de servicos
     */

     public function servico()
     {
        return $this->belongsTo(Servico::class, 'servico_id', 'id');
     }
}
