<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'birthday'
    ];
    /**
     *
     * @var array
     */
    protected $fillable = [
        'name', 'birthday', 'email', 'telefon', 'url', 'addition', 'imagefilename'
    ];

	public function user()
	{
		return $this->belongsTo('App\User', 'id');
	}
	
	// public function likedProfiles()
	// {
		// return $this->belongsToMany(Profile::class, 'profileToProfiles', 'id', 'id');
	// }
    
    public function likingUsers()
	{
		return $this->belongsToMany(User::class);//, 'profileToProfiles', 'id', 'id');
	}
    
}
