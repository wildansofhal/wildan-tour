<?php

namespace App\Models;

use App\Models\DashPackage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class DashCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function package(){
        return $this->hasMany(DashPackage::class , 'category_id');
    }
}
