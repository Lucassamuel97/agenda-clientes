<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;


class Event extends Model
{
  use HasFactory;
  protected $fillable = [
		'title', 'start', 'end','client','description','color','user_id'
	];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
