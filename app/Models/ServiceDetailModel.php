<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceDetailModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "services_detail";

    protected $guarded = [];

    public function service()
    {
        return $this->belongsTo(ServiceModel::class, 'id_service', 'id');
    }
}
