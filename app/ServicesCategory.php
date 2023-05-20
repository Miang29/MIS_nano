<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicesCategory extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'service_category_name',
    ];

    public function services() {
        return $this->hasMany('App\Services', 'service_category_id');
    }

    public function variations() {
        return $this->hasMany('App\ServicesVariation','service_category_name');
    }

    public function consultation() {
        return $this->hasMany('App\ConsultationTransaction','service_category_id');
    }

    public function otherTransaction() {
        return $this->hasMany('App\OtherTransation');
    }

}
