<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'alamat', 'pekerjaan', 'nama_lengkap', 'pendidikan', 'telp'
    ];

    public function user()
    {
        return  $this->hasOne(User::class, 'id', 'user_id');
    }
}
