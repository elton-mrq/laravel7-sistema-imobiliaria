<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Perfil;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function listaPerfil()
    {
        return $this->belongsToMany('App\Perfil');
    }

    public function adicionaPerfil($perfil)
    {
        //se for string
        if(is_string($perfil)){
            return $this->listaPerfil()->save(
                Perfil::where('nome', '=', $perfil)->firstOrFail()
            );
        }

        //se for um objeto
        return $this->listaPerfil()->save(
            Perfil::where('nome', '=', $perfil->nome)->firstOrFail()
        );
    }

    public function removePerfil($perfil)
    {
        if(is_string($perfil)){
            return $this->listaPerfil()->detach(
                Perfil::where('nome', '=', $perfil)->firstOrFail()
            );
        }

        return $this->listaPerfil()->detach(
            Perfil::where('nome', '=', $perfil->nome)->firstOrFail()
        );
    }

    public function existePerfil($perfil)
    {
        if(is_string($perfil)){
            return $this->listaPerfil->contains('nome', $perfil);
        }

        return $perfil->intersect($this->listaPerfil)->count();
    }

    public function perfilAdmin()
    {
        return $this->existePerfil('admin');
    }
}
