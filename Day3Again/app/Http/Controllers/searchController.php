<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\adds;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades;
use function Sodium\add;


class searchController extends Controller
{

    public function showSearch()
    {
        return view('search');
    }

    public function showSearchResult()
    {
        $search_form = session()->get('data_search');
        $data_search = adds::getData($search_form);
        $array_int = 0;
        $array_id = [];

        foreach ($data_search as $tmp_data) {
            $array_id[$array_int] = $tmp_data->adds_id;
        }
        $data_adds = adds::Find($array_id);
        session()->reflash();
        if ($data_search == NULL)
            $data_search = [];
        return view('search_result')
            ->with('data_adds', $data_adds);
    }

    public function postSearch(Request $request)
    {
//        $data = adds::getData('image_type', $request->get('image_type'));
        $data = $request->all();
        return redirect('search_result')
            ->with('data_search', $data);
    }

    public function postShowSearchResult(Request $request)
    {
        $search_form = session()->get('data_search');

        if ($request->has('_token')) {
//            adds::setDataInOrder();
            $data_search = adds::getDataInOrder($search_form);
        } else {
            $data_search = adds::getData($search_form);
        }
        session()->reflash();
        if ($data_search == NULL)
            $data_search = [];
        return view('search_result')
            ->with('data_adds', $data_search);
    }
}
