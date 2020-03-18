<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'zip', 'notice'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function helpers()
    {
        return $this->belongsToMany(Helper::class)->withTimestamps();
    }

    public function getRouteKeyName() {
        return 'name';
    }

    public function getRouteKey() {
        return strtolower($this->name);
    }

    public function phoneNumbers() {
        $pn = [];
        foreach (explode("\n", $this->notice) as $line) {
            $info = explode('|', $line);
            if ($info[0] == 'tel') $pn[] = ['name' => $info[1], 'number' => $info[2]];
        }
        return $pn;
    }

    public function emailAddresses() {
        $pn = [];
        foreach (explode("\n", $this->notice) as $line) {
            $info = explode('|', $line);
            if ($info[0] == 'email') $pn[] = ['name' => $info[1], 'email' => $info[2]];
        }
        return $pn;
    }
}
