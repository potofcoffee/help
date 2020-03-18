<?php

namespace App;

use App\Services\Geocoder;
use AustinHeap\Database\Encryption\Traits\HasEncryptedAttributes;
use Illuminate\Database\Eloquent\Model;

class HelpRequest extends Model
{
    use HasEncryptedAttributes;

    protected $fillable = ['name', 'address', 'zip', 'city', 'phone', 'email', 'threema', 'notes', 'request', 'done', 'city_id', 'user_id', 'lat', 'lon'];

    protected $encrypted = ['name', 'address', 'zip', 'city', 'phone', 'email', 'threema', 'notes', 'request'];

    public function assignedCity()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function helpers()
    {
        return $this->belongsToMany(Helper::class, 'helper_help_request')->withTimestamps();
    }

    public function geocode() {
        if (($this->address != '') && ($this->zip != '') && ($this->city != '')) {
            $data = Geocoder::resolve($this->address, $this->zip, $this->city);
            if (isset($data['lon']) && isset($data['lat'])) {
                $this->lon = $data['lon'];
                $this->lat = $data['lat'];
                $this->save();
                return $data;
            }
        }
        return null;
    }
}
