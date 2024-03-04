<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['servico_id', 'user_id'];

    public function servico()
    {
        return $this->belongsTo(Servicos::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
