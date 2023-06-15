<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroomingTransaction extends Model
{
   protected $fillable = [
    'transaction_id',
    'pet_name',
    'variation_id',
    'price',
    'additional_cost',
    'total',
];
    protected $table = "grooming_transaction";

    protected function serviceOrderTransaction() {
        return $this->belongsTo('App\serviceOrderTransaction');
    }

    public function petsInformations() {
        return $this->belongsTo('App\PetsInformation', 'pet_name', 'id');
    }

    public function variations() {
        return $this->belongsTo('App\ServicesVariation', 'variation_id',);
    }

     // CUSTOM FUNCTION
    public function isVoided() {
        return (!empty($this->voided_at) || ($this->voided_at != null));
    }
}
