<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    use HasFactory;
    protected $table = 'suppliers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sid',
        'AccCode',
        'AccName',
        'Category',
        'SubCategory',
        'Salesman',
        'CreditLimit',
        'CreditActive',
        'Warning',
        'Unlimit',
        'Combine',
        'Taxno',
        'TaxName',
        'TaxAddr',
        'PaymentAddr',
        'Area2',
        'PriceChannel',
        'AccNo',
        'Memo',
        'AccType',
        'Active',
        'CreatedBy',
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
}