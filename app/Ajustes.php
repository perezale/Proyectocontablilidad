<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ajustes extends Model
{
    protected $table='configsistema';
    
    protected $primaryKey='idconfigsistema';
    
    public $timestamps=false;

    protected $fillable=[
    'uvt',
    'nom_articulo',
    'salariominimo',
    'auxcomida'
    ];
}
