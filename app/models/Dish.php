<?php
class Dish extends Eloquent {
  protected $table = 'dishes';
  public static $unguarded = true;
  public function menus()
  {
    return $this->belongsToMany('Menu', 'dishes_menus')->withTimestamps();
  }
  public function type()
   {
        return $this->belongsTo('DishType');
   }
}
?>