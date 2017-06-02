<?php namespace App\Lib;

use App\Township;
use App\DateAppeal;

class ScrapingHelper{

  public static function fetch_accessor_dates()
  {
    $path = 'http://www.cookcountyassessor.com/Appeals/Appeal-Deadlines.aspx';
    $html = new \Htmldom($path);
    
    $wrappers = $html->find('.accordion-group');

    $rows = [];

    foreach ($wrappers as $wrapper) {
      $title = $wrapper->find('.accordion-heading', 0)->find('a', 0)->plaintext;
      $year = (int)explode(' ', $title)[0];

      $table = $wrapper->find('table.tablix', 0);

      foreach ($table->find('tr') as $tr) {
        if ($tr->class != 'gold') {
          $open     = date_create_from_format('n/j/Y', $tr->childNodes(1)->plaintext);
          $close    = date_create_from_format('n/j/Y', $tr->childNodes(2)->plaintext);
          $refresh  = date_create_from_format('n/j/Y', $tr->childNodes(5)->plaintext);

          $rows[] = array (
            'township'    => str_replace('*', '', $tr->childNodes(0)->first_child()->plaintext),
            'year'        => $year,
            'type'        => 0,
            'open'        => $open ? $open : NULL,
            'close'       => $close ? $close : NULL,
            'refresh'     => $refresh ? $refresh : NULL,
          );
        }
      }
    }

    foreach ($rows as $row) {
      $township = Township::firstOrCreate(array(
        'name' => $row['township']
      ));

      unset($row['township']);

      $dateAppeal = DateAppeal::firstOrCreate(array(
        'township_id' => $township->id,
        'year'        => $row['year']
      ));
      $dateAppeal->update($row);
    }
    
  }

}
