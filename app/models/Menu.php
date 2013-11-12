<?php
class Menu extends Eloquent {
  protected $table = 'menus';

  public function dishes()
  {
    return $this->belongsToMany('Dish', 'dishes_menus')->withTimestamps();
  }
}
?>