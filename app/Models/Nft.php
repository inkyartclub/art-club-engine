<?php

namespace App\Models;

use App\Jobs\MintNftCollection;
use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nft extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;

    public $table = 'nfts';

    public $orderable = [
        'id',
        'collection.name',
        'collection.symbol',
        'metadata.name',
        'metadata.cid',
        'total_to_mint',
        'total_minted',
    ];

    public $filterable = [
        'id',
        'collection.name',
        'collection.symbol',
        'metadata.name',
        'metadata.cid',
        'total_to_mint',
        'total_minted',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'collection_id',
        'metadata_id',
        'total_to_mint',
    ];

//    protected $hidden = [
//        'updated_at',
//        'created_at',
//        'deleted_at',
//    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            MintNftCollection::dispatch($model->id);
        });
    }

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    public function metadata()
    {
        return $this->belongsTo(Metadata::class);
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
