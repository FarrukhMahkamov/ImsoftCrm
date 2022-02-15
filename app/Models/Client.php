<?php
//Client
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'general_info',
        'enterprise_name',
        'category_id',
        'activity_type_id',
        'state_id',
        'region_id',
        'address_id',
        'home_address',
        'order_reason',
        'client_name',
        'client_phone_number',
        'client_phone_number_2',
        'client_born_date',
        'operator_id',
        'operator_phone_number',
        'operator_phone_number_2',
        'operator_born_date',
        'latitude',
        'longtitude',
        'file',
        'type_id',
        'order_time',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function activityType()
    {
        return $this->belongsTo(ActivityType::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function operator()
    {
        return $this->belongsTo(Operator::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function project()
    {
        return $this->hasMany(Project::class);
    }

}
