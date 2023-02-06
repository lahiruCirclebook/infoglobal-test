<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;


class User extends Authenticatable
{

    protected $table = "users";
    protected $primaryKey = 'id';

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function checkUser($email)
    {
        try {
            $result = $this->where("email", $email)->first();
            if ($result) {
                return true;
            }
            return false;
        } catch (QueryException $ex) {
            Log::info("UserModel Error", ["register" => $ex->getMessage(), "line" => $ex->getLine()]);
            return false;
        }
    }


    public function register($name, $email, $password)
    {
        try {
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            if ($this->save()) {
                return true;
            }
            return false;
        } catch (QueryException $ex) {
            Log::info("UserModel Error", ["register" => $ex->getMessage(), "line" => $ex->getLine()]);
            return false;
        }
    }
}
