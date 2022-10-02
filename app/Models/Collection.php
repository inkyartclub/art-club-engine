<?php

namespace App\Models;

use App\Jobs\CreateNftCollection;
use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;

    public $table = 'collections';

    public $orderable = [
        'id',
        'symbol',
        'name',
        'supply',
        'royalty_fee',
        'token',
        'image_url',
        'release_at',
        'pass.token',
    ];

    public $filterable = [
        'id',
        'symbol',
        'name',
        'supply',
        'royalty_fee',
        'token',
        'image_url',
        'release_at',
        'pass.token',
    ];

    protected $dates = [
        'release_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

//    protected $hidden = [
//        'updated_at',
//        'created_at',
//        'deleted_at',
//    ];

    protected $fillable = [
        'symbol',
        'name',
        'supply',
        'royalty_fee',
        'image_url',
        'release_at',
        'pass_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            CreateNftCollection::dispatch($model->id);
        });
    }

    public function getReleaseAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setReleaseAtAttribute($value)
    {
        $this->attributes['release_at'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function pass()
    {
        return $this->belongsTo(Pass::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

//    public function hasPassExpectedSupply()
//    {
//        return $this->pass()->where('supply', 300);
//    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
