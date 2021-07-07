<?php

namespace Modules\Paginas\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Storage;
use Modules\Paginas\Entities\Media;
use DB;
use Str;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

  
    public function index()
    {
        
        return view('paginas::media.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function guardar(Request $request)
    {
        
        
        DB::beginTransaction();
        try {

            $media = Storage::disk('media');
        
            $file = $request->file('file');

            $extension = $file->getClientOriginalExtension();
            $filename_completo = $file->getClientOriginalName();
            $numero = 1;
            $nombre_slug = Str::slug($filename_completo, '-');
            $nombre_archivo_slug = $nombre_slug.".".$extension;
            $nombre_archivo = $nombre_archivo_slug ;
            
            while (true) {
            
                if($media->exists($nombre_archivo)){
                    $nombre_archivo  = $numero."-".$nombre_archivo_slug;
                }else {
                    break;
                }
                $numero++;
            }

            $request->file->move(public_path('/asset/media'),  $nombre_archivo);
            
            Media::create([
                'slug' => "/asset/media/".$nombre_archivo
            ]);
        } catch (\Exception $th) {
            DB::rollback();
            return 'ERROR';
        }   
        DB::commit();

        return redirect()->route('media');

        
    }

   
  


    public function store(Request $request){

        DB::beginTransaction();
        try {

            Paginas::create([
                'titulo' => $request->titulo,
                'slug'   => $request->slug,
                'head'   => $request->head,
                'body'   => $request->body,
                'footer' => $request->footer
            ]);
        } catch (\Exception $th) {
            DB::rollback();
            return 'ERROR';
        }   
        DB::commit();

        return redirect()->route('paginas');
    }

    
    public function destroy(Request $request)
    {
       
        DB::beginTransaction();
        try {
            Media::where('id', $request->id)->delete();
        } catch (\Exception $th) {
            DB::rollback();
            return 'ERROR';
        }   
        DB::commit();

        return "OK";    
    }

    public function datatable(Request $request)
    {
        
        $user = Media::select(
            'id',
            'slug'
        );
        return datatables()->of($user->get())->setRowId('id')->make(true);
    }
}
