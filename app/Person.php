<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ScopePerson;

class Person extends Model
{
    public function getData(){
      return $this->id.":".$this->name."(".$this->age.")";
    }
//
// //スコープ検索
//     public function scopeNameEquel($query, $str){
//       return $query->where('name',$str);
//     }
//
//     public function scopeAgeGreaterThan($query,$n){
//       return $query->where('age','>=',$n);
//     }
//
//     public function scopeAgeLessThan($query,$n){
//       return $query->where('age','<=',$n);
//     }
//
// //グローバルスコープ
//   //全てのレコード取得に適用される
//      protected static function boot(){
//        parent::boot();
//        static::addGlobalScope(new ScopePerson);
//        }

// Personに新しいレコードを保存する
  protected $guarded = array('id'); //guarded で、nullでも動くようにする
  public static $rules = array(
    'name' => 'required',
    'mail' => 'email',
    'age' => 'integer|min:0|max:150',
  );

  public function boards(){
    return $this->hasMany('App\Board');
  }
}
