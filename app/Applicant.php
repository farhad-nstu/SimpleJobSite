<?php

namespace App;

use App\Notifications\Applicant\ApplicantResetPassword;
use App\Notifications\Applicant\ApplicantVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Job;

class Applicant extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'first_name','last_name', 'email', 'password',
    ];

    public function jobs()
    {
        return $this->belongsToMany(Job::class);
    }


    /* public function companies(){
        return $this->belongsToMany('App\Applicant');
    }*/




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

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ApplicantResetPassword($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new ApplicantVerifyEmail);
    }

}
