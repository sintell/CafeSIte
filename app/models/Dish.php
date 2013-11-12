<?php
class Dish extends Eloquent {
  protected $table = 'dishes';

  public function menus()
  {
    return $this->belongsToMany('Menu', 'dishes_menus')->withTimestamps();
  }
}
?>