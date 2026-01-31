<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role_id']; // Campos que se pueden llenar masivamente

    // Relaciones
    public function role()
    {
        return $this->belongsTo(Role::class); // Un usuario pertenece a un rol
    }

    public function assignedTickets()
    {
        return $this->hasMany(Ticket::class, 'assigned_to'); // Un usuario tiene muchos tickets asignados
    }

    public function ticketComments()
    {
        return $this->hasMany(TicketComment::class); // Un usuario tiene muchos comentarios 
    }
}
