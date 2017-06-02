<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DateAppeal extends Model {

  protected $table = 'dates_appeals';

  protected $fillable = ['township_id', 'year', 'type', 'open', 'close', 'refresh'];

  protected $dates = ['open', 'close', 'refresh', 'created_at', 'updated_at'];

  public function township()
  {
    return $this->belongsTo('App\Township');
  }

}
