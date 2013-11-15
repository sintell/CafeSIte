<?php
class DishType extends Eloquent {
  protected $table = 'dishes_types';

 public function dishes()
 {
      return $this->hasMany('Dish', 'type');
 }
}
?>