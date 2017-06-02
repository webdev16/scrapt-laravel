<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Township extends Model {

	protected $table = 'townships';

  protected $fillable = ['name'];

  protected $dates = ['created_at', 'updated_at'];

  public function date_appeals()
  {
    return $this->hasMany('App\DateAppeal');
  }

}
