<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "services";

    protected $guarded = [];

    public function details()
    {
        return $this->hasMany(ServiceDetailModel::class, 'id_service', 'id');
    }
}
