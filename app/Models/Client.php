<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'fullname', 'gender', 'city', 'address', 'phone', 'email'
    ];

    public function routeNotificationForMail($notification)
    {
        // Return email address only...
        return $this->email;
 
        // // Return email address and name...
        // return [$this->email => $this->name];
    }
    
    public function routeNotificationForTelegram($notification)
    {
        return $this->phone;
    }

}
