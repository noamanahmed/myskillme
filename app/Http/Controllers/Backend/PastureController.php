<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreatePasture;
use App\Http\Requests\Backend\UpdatePasture;
use App\Models\Pasture;

class PastureController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('backend.pasture.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.pasture.create');
            
    }

    /**
     * @return mixed
     */
    public function store(CreatePasture $request)
    {
        $pasture = new Pasture();

        $pasture->name = $request->get('name');
        $pasture->grass_condition = $request->get('grass_condition');
        $pasture->temperature = $request->get('temperature');

        $pasture->save();
        
        return redirect()->route('admin.pasture.index')->withFlashSuccess(__('The pasture was successfully created.'));
    }


    public function edit(Pasture $pasture)
    {
        return view('backend.pasture.edit')
            ->withPasture($pasture);            
    }



    /**
     * @return mixed
     */
    public function update(Pasture $pasture,UpdatePasture $request)
    {
        
        $pasture->name = $request->get('name');
        $pasture->grass_condition = $request->get('grass_condition');
        $pasture->temperature = $request->get('temperature');

        $pasture->save();
        
        return redirect()->back()->withFlashSuccess(__('The pasture was successfully updated.'));
    }

    public function destroy(Pasture $pasture,Request $request)
    {
        $pasture->delete();

        return redirect()->back()->withFlashSuccess(__('The pasture was successfully deleted.'));
    }


}
