<?php

namespace Modules\Paginas\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Storage;
use Modules\Paginas\Entities\menu;
use Modules\Paginas\Entities\Paginas;
use DB;
use Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

  
    public function index()
    {

        $paginas = Paginas::pluck('slug',"slug");
        
        return view('paginas::menu.index', ['paginas' => $paginas]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function guardar(Request $request)
    {
        DB::beginTransaction();
        try {

        
            if($request->id == ""){
                menu::create([
                    'name' => $request->nombre,
                    'slug' => $request->slug,
                    'parent' => 0,
                    'order' => $request->orden,
                    'enabled' => 1
                ]);
            }else{
                menu::where('id',$request->id)->update([
                    'name' => $request->nombre,
                    'slug' => $request->slug,
                    'parent' => 0,
                    'order' => $request->orden,
                    'enabled' => 1
                ]);

            }

        
        } catch (\Exception $th) {
            DB::rollback();
            return 'ERROR';
        }   
        DB::commit();
        return redirect()->route('menu');
    
    }


    public function destroy(Request $request)
    {
       
        DB::beginTransaction();
        try {
            
            menu::where('id', $request->id)->delete();

        } catch (\Exception $th) {
           
            DB::rollback();
            return 'ERROR';
        }   
        DB::commit();
        return "OK";    
    }

    public function edit(Request $request)
    {
        
        $menu = menu::where('id', $request->id)->first();
        return json_encode([
            'nombre'                  => $menu->name,
            'slug'                    => $menu->slug,
            'order'                   => $menu->order,
            'id'                   => $menu->id
        ]);
    }
    public function datatable(Request $request)
    {
        
        $menu = menu::select(
            'id',
            'name',
            'slug',
            'order'
        )->orderBy('order', 'desc');
        return datatables()->of($menu->get())->setRowId('id')->make(true);
    }
}
