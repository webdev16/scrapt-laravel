<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Township;
use App\DateAppeal;

use App\Lib\ScrapingHelper;

class MaintenanceController extends Controller {

  public function fetch_dates()
  {
    ScrapingHelper::fetch_accessor_dates();

    $dateAppeals = DateAppeal::get();

    return view('maintenance.fetch_dates',
      array('dateAppeals' => $dateAppeals)
    );
  }

}
