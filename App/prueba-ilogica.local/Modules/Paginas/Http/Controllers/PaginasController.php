<?php

namespace Modules\Paginas\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\Paginas\Entities\Paginas;
use DB;

class PaginasController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

  
    public function index()
    {
        return view('paginas::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('paginas::create');
    }

   
    public function uploadFile(Request $request)
    {
        try {
            $destinationPath = 'js/uploaded/';
            $_destinationPath = public_path($destinationPath);
            
            $files = request()->file('files');
            $filesArr = [];
            
            foreach ($files as $file) {
                $fileOriginalName = $file->getClientOriginalName();
                preg_match('/(.+)\.(\w+)/i', $fileOriginalName, $match);
                $fileName = @$match[1] . time() . '.' . $match[2];
                
                $file->move($_destinationPath, $fileName);
                $filesArr[] = asset($destinationPath . $fileName);
            }

            return [
                'files' => $filesArr
            ];


        } catch (\Exception $e) {
            return response()->json([
                'files' => []
            ], 500);
        }
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
            dd($th);
            DB::rollback();
            return 'ERROR';
        }   
        DB::commit();

        return redirect()->route('paginas');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('paginas::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Request $request)
    {

        $pagina = Paginas::where('id', $request->id)->first();
        return view('paginas::edit',["pagina" => $pagina]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        DB::beginTransaction();
        try {

            Paginas::where('id', $request->id)->update([
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

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
       
        DB::beginTransaction();
        try {
            Paginas::where('id', $request->id)->delete();
        } catch (\Exception $th) {
            DB::rollback();
            return 'ERROR';
        }   
        DB::commit();

        return "OK";    
    }

    public function datatable(Request $request)
    {
        
        $user = Paginas::select(
            'id',
            'titulo',
            'slug'
        );
        return datatables()->of($user->get())->setRowId('id')->make(true);
    }
}
