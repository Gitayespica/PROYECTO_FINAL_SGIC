<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function client() { 
        return $this->belongsTo(Client::class); } 
        
    public function assignedUser() { 
        return $this->belongsTo(User::class, 'assigned_to'); } 
    
    public function comments() { 
        return $this->hasMany(TicketComment::class); } 
            
    public function attachments() { 
        return $this->hasMany(TicketAttachment::class); }
}
