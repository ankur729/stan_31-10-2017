<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Communicate extends Model
{

		protected $fillable=[
			'm_cat',
			'm_sub_cat',
			'm_topic',
			'm_date',
			'm_person_name',
			'm_contact',
			'm_idproof',
			'm_desc',
			'student_id'
			
	];

	protected $table='communicates';

		 
		 public function replies()
    {
        return $this->hasMany('App\CommunicateReply','communicate_id','id');
    }
    //
}
