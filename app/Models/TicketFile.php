<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketFile extends Model
{
    use HasFactory;

    protected $fillable = ['file_path', 'file_name', 'ticket_id'];

    // Relaciones
    public function ticket()
    {
        return $this->belongsTo(Ticket::class); // Un archivo pertenece a un ticket
    }
}
