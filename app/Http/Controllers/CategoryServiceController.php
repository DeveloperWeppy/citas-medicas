<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\CategoryService;
use Illuminate\Http\Request;

class CategoryServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = CategoryService::get();
        return view('admin.categorys.index')->with('categorys', $categorys);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $error = false;
        $mensaje = '';

        $namecategory = $request->name;
        $validar_category = CategoryService::where('name', $namecategory)->count();

        if ($validar_category > 0) {
            $error = true;
            $mensaje = 'Error! Ya se encuentra registrada la categoría "' . $namecategory;
        } else {

            $register_category = array(
                'name' => $namecategory,
                'description' => $request->description,
                'observation' => $request->observation,
            );

            if (CategoryService::create($register_category)) {
                $error = false;
                $mensaje = 'Registro de Categoria Exitoso!';
            } else {
                $error = true;
                $mensaje = 'Error! Se presento un problema al registrar la categoría, intenta de nuevo.';
            }
        }
        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryService  $categoryService
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryService $categoryService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryService  $categoryService
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryService $categoryService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryService  $categoryService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryService $categoryService)
    {
        $error = false;
        $mensaje = '';

        $namecategory = $request->name;

            $update_category = array(
                'name' => $namecategory,
                'description' => $request->description,
                'observation' => $request->observation,
            );

            if (CategoryService::findOrFail($request->id)->update($update_category)) {
                $error = false;
                $mensaje = 'Categoría Actualizada Exitosamente!';
            } else {
                $error = true;
                $mensaje = 'Error! Se presento un problema al registrar la categoría, intenta de nuevo.';
            }

        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryService  $categoryService
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $error = false;
        $mensaje = '';
        $Service = Service::where('category_id', $id)->get();
        if(count($Service)==0){
            if (CategoryService::findOrFail($id)->delete()) {
                $error = false;
            } else {
                $error = true;
                $mensaje = 'Error! Se presento un problema al eliminar, intenta de nuevo.';
            }
        }else{
          $error = true;
          $mensaje = 'Error! La categoria esta asociada con un servicio.';
        }
        echo json_encode(array('error' => $error, 'mensaje' => $mensaje));
    }
}
