<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveForm
{
    use HasFactory;
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user', 'allowance', 'hex'
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

    // label
    public function lb($txt) {
        $name = $form->name ?? 'name';
        $value = '';
        return "<label for='exampleFormControlTextarea1' class='form-label'>$txt</label>" ;
    }



    public function tb($form) {
        $name = $form->name ?? 'name';
        $id = $form->id ?? $name;
        $value = '';
        return "<input id='$id' name='$name' type='text' class='form-control' value='$value' ></input>" ;
    }

    
    public function create_form($form) {
        dump($form);
        $out = '';
        foreach($form as $f) {
             $out.="<div class='mb-3'>";
             $out.= $f[0];
             $out.= $f[1]??'';
             $out.="</div> ";
        }
        return $out;
    }

}
