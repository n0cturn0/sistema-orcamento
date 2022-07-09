<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    use HasFactory;
    protected $fillable = [
        'dataentrada', 'previsaosaida', 'modelo', 'marca',
        'operador','cliente', 'item', 'itemquantidade', 'itempreco',
        'valortoral', 'status'

];
}
