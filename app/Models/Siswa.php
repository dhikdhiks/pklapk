<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = ['id','nama','nis','gender','alamat','kontak','email','status_lapor_pkl', 'foto'];

    public function pkls() {
        return $this->hasMany(Pkl::class);
    }

    public function user()
{
    return $this->belongsTo(User::class, 'email', 'email');
}
}
