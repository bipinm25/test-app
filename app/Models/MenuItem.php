<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{

    public function menus(){
        return $this->hasMany(MenuItem::class,'parent_id','id');
    }

    public function childrenmenus(){
        return $this->hasMany(MenuItem::class,'parent_id')->with('menus');
    }

}
