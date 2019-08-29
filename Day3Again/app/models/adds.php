<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\dogs;

class adds extends Model
{
    protected $fillable = ["title", "image", "image_type", "description", "price", "creator"];

    public function cats()
    {
        return $this->hasMany('App\models\cats');
    }

    public function dogs()
    {
        return $this->hasMany('App\models\dogs');
    }

    static public function getData($search)
    {
        $count = NULL;
        $data = NULL;

        if ($search['image_type'] == 'DOG') {
            if ($search['race_dog'] != 'NONE' && $search['color'] != 'NONE') {
                $count = dogs::where('race', '=', $search['race_dog'])->where('color', '=', $search['color'])->count();
                $data = dogs::where('race', '=', $search['race_dog'])->where('color', '=', $search['color'])->take($count)->get();
            } elseif ($search['race'] != 'NONE' && $search['color'] == 'NONE') {
                $count = dogs::where('race', '=', $search['race_dog'])->count();
                $data = dogs::where('race', '=', $search['race_dog'])->take($count)->get();
            } elseif ($search['race_dog'] == 'NONE' && $search['color'] != 'NONE') {
                $count = dogs::where('color', '=', $search['color'])->count();
                $data = dogs::where('color', '=', $search['color'])->take($count)->get();
            } else {
                $count = adds::where('image_type', '=', $search['image_type'])->count();
                $data = adds::where('image_type', '=', $search)->take($count)->get();
            }
        } elseif ($search['image_type'] == 'CAT') {
            if ($search['race_cat'] != 'NONE' && $search['color'] != 'NONE') {

            } elseif ($search['race'] != 'NONE' && $search['color'] == 'NONE') {

            } elseif ($search['race'] == 'NONE' && $search['color'] != 'NONE') {

            } else {
                $count = adds::where('image_type', '=', $search['image_type'])->count();
                $data = adds::where('image_type', '=', $search['image_type'])->take($count)->get();
            }
        }

        return $data;
    }

    static public function GetDataInOrder($search)
    {
        $count = adds::where($element, '=', $search)->count();
        $data = adds::orderBy("created_at", "desc")->latest()->where($element, '=', $search)->take($count)->get();

        return $data;
    }
}
//static public function getData($element, $search)
//{
//    $count = adds::where($element, '=', $search)->count();
  //  $data = adds::where($element, '=', $search)->take($count)->get();
//
  //  return $data;
//}

//         $data = adds::orderBy("created_at", "desc")->latest()->where($element, '=', $search)->take($count)->get();
