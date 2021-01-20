<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreateCattle;
use App\Http\Requests\Backend\UpdateCattle;
use App\Models\Cattle;
use App\Models\Pasture;

class CattleController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.cattle.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        $already_selected_pasture_ids = Cattle::pluck('pasture_id')->toArray();

        $pastures = Pasture::whereNotIn('id',$already_selected_pasture_ids)->pluck('name','id');

        return view('backend.cattle.create',compact('pastures'));
            
    }

    /**
     * @return mixed
     */
    public function store(CreateCattle $request)
    {
        $cattle = new Cattle();

        $cattle->age = $request->get('age');
        $cattle->weight = $request->get('weight');
        $cattle->gender = $request->get('gender');        
        $cattle->health = $request->get('health');
        $cattle->color = $request->get('color');
        $cattle->price = $request->get('price');
        $cattle->pasture_id = $request->get('pasture_id');

        $cattle->save();
        
        return redirect()->route('admin.cattle.index')->withFlashSuccess(__('The cattle was successfully created.'));
    }


    public function edit(Cattle $cattle)
    {
        $already_selected_pasture_ids = Cattle::query()->where('pasture_id','!=',$cattle->pasture_id)->pluck('pasture_id')->toArray();


        $pastures = Pasture::whereNotIn('id',$already_selected_pasture_ids)->pluck('name','id');


        return view('backend.cattle.edit')
            ->withCattle($cattle)
            ->withPastures($pastures);            
    }



    /**
     * @return mixed
     */
    public function update(Cattle $cattle,UpdateCattle $request)
    {
        
        $cattle->age = $request->get('age');
        $cattle->weight = $request->get('weight');
        $cattle->gender = $request->get('gender');        
        $cattle->health = $request->get('health');
        $cattle->color = $request->get('color');
        $cattle->price = $request->get('price');
        $cattle->pasture_id = $request->get('pasture_id');

        $cattle->save();
        
        return redirect()->back()->withFlashSuccess(__('The cattle was successfully updated.'));
    }

    public function destroy(Cattle $cattle,Request $request)
    {
        $cattle->delete();

        return redirect()->back()->withFlashSuccess(__('The cattle was successfully deleted.'));
    }


}
