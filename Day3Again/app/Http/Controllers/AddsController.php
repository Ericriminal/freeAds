<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\adds;
use App\models\dogs;
use App\models\cats;
use Illuminate\Support\Facades\Auth;
use function Sodium\add;


class AddsController extends Controller
{
    public function ShowAdds()
    {
        $count = adds::where('creator', '=', Auth::id())->count();
        $data = adds::where('creator', '=', Auth::id())->take($count)->get();

        return view('edit_adds')
            ->with('data_adds', $data);
    }

    public function ShowCreateAdd()
    {
        return view('create_add');
    }

    public function ShowEditOldAdd()
    {
        $data = session()->get('data');

        return view('edit_old_add')
            ->with('data', $data);
    }

    public function StoreAdd(Request $request)
    {
        $validatedData = $request->validate([
            'image'     => 'required',
            'image_type'    => 'required',
            'title'     => 'required',
            'description'  => 'required',
            'price' => 'required',
        ]);
        if (!@getimagesize($request->get('image')))
            return redirect('create_add')->withErrors("Image URL doesn't work");

        $fill_form = array(
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'image' => $request->get('image'),
            'image_type' => $request->get('image_type'),
            'creator' => Auth::id(),
        );
        $device = new adds($fill_form);
        $device->save();
        if ($request->get('image_type') == 'DOG') {
            $device->dogs()->save(new dogs(array('race' => $request->get('race_dog'), 'color' => $request->get('color'), 'adds_id' => $device->id)));
        }
        else if ($request->get('image_type') == 'CAT')
            $device->cats()->save(new cats(array('race' => $request->get('race_cat'), 'color' => $request->get('color'), 'adds_id' => $device->id)));
        return redirect('edit_adds');
    }

    public function PostActionAdd(Request $request) {

        $id_add = $request->get('id_add');

        if ($request->get('post_action') == 'edit')
            return $this->RedirectEditOldAdd($id_add);
        else if ($request->get('post_action') == 'delete')
            return $this->DeleteAdd($id_add);
    }

    public function RedirectEditOldAdd($id_add) {
        $data = adds::Find($id_add);

        return redirect('edit_old_add')
            ->with('data', $data);
    }

    public function DeleteAdd($id_add) {
        $data = adds::Find($id_add);
        $data->delete();
        return redirect('edit_adds');
    }

    public function StoreEditOldAdd(Request $request) {
        $validatedData = $request->validate([
            'image'     => 'required',
            'title'     => 'required',
            'description'  => 'required',
            'price' => 'required',
        ]);
        if (!@getimagesize($request->get('image')))
            return redirect('edit_old_add')->withErrors("Image URL doesn't work")->with('data', adds::Find($request->get('id_add')));

        $device = adds::Find($request->get('id_add'));

        $device->title = $request->get('title');
        $device->description = $request->get('description');
        $device->price = $request->get('price');
        $device->image = $request->get('image');
        $device->image_type = $request->get('image_type');
        $device->creator = Auth::id();
        $device->save();
        return redirect('edit_adds');
    }
}
