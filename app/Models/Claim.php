<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Claim extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;

    public $table = 'claims';

    public $orderable = [
        'id',
        'serial',
        'collection.name',
        'collection.symbol',
        'claim_account',
        'claimed_at',
    ];

    public $filterable = [
        'id',
        'serial',
        'collection.name',
        'collection.symbol',
        'claim_account',
        'claimed_at',
    ];

    protected $dates = [
        'claimed_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
      'serial',
      'claimed_at',
      'collection_id',
      'claim_account'
    ];

    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }

    public function getClaimedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
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
