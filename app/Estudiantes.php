<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
   protected $fillable = [
                  'nombre','matricula','apellido_paterno', 'apellido_materno', 'salon_id', 'materias_id'
              ];
}
