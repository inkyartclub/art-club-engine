<?php

namespace App\Models;

use App\Jobs\GenerateMetadataThroughAdmin;
use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Metadata extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;

    public $table = 'metadatas';

    public $orderable = [
        'id',
        'name',
        'creator',
        'description',
        'cid',
        'type',
        'generated_cid',
    ];

    public $filterable = [
        'id',
        'name',
        'creator',
        'description',
        'cid',
        'type',
        'generated_cid',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'creator',
        'description',
        'cid',
        'type',
    ];

//    protected $hidden = [
//        'updated_at',
//        'created_at',
//        'deleted_at',
//    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function($model) {
            GenerateMetadataThroughAdmin::dispatch($model->id);
        });
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
