<?php

namespace App;

use App\Services\Geocoder;
use AustinHeap\Database\Encryption\Traits\HasEncryptedAttributes;
use Illuminate\Database\Eloquent\Model;

class Helper extends Model
{
    use HasEncryptedAttributes;

    protected $fillable = ['name', 'address', 'zip', 'city', 'phone', 'email', 'threema', 'notes', 'lon', 'lat'];

    protected $encrypted = ['name', 'address', 'zip', 'city', 'phone', 'email', 'threema', 'notes'];

    public function cities()
    {
        return $this->belongsToMany(City::class)->withTimestamps();
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
