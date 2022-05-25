<?php

namespace App\Http\Controllers;

use App\Provider;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProviderController extends Controller
{
    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return providers list
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::all();

        return $this->successResponse($providers);
    }

    /**
     * Create an instance of Provider
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $rules = [            
            'nombre'    => 'required|max:255',        
            'direccion' => 'required|max:255',
            'colonia'   => 'required|max:255',
            'estado'    => 'required|max:255',
            'cp'        => 'required|max:255',
            'rfc'       => 'required|max:25',
            'telefono'  => 'required|max:25',
            'movil'     => 'required|max:25',
            'correo'     => 'email',
            'contrato'  => 'required|max:25',
        ];
        #var_dump($rules);die();
        $this->validate($request, $rules);

        $provider = Provider::create($request->all());

        return $this->successResponse($provider, Response::HTTP_CREATED);
    }

    /**
     * Return an specific provider
     * @return Illuminate\Http\Response
     */
    public function show($provider)
    {
        $provider = Provider::findOrFail($provider);

        return $this->successResponse($provider);
    }

    /**
     * Update thej information of an existing provider
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $provider)
    {
        $rules = [
            'nombre'=> 'required|max:255',        
            'direccion'=> 'required|max:255',
            'colonia'=> 'required|max:255',
            'estado'=> 'required|max:255',
            'cp'=> 'required|max:255',
            'rfc'=> 'required|max:25',
            'telefono'=> 'required|max:25',
            'movil'=> 'required|max:25',
            'correo'=> 'required|max:100',
            'contrato'=> 'required|max:25',
        ];

        $this->validate($request, $rules);

        $provider = Provider::findOrFail($provider);

        $provider->fill($request->all());

        if ($provider->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $provider->save();

        return $this->successResponse($provider);

    }

    /**
     * Removes an existing provider
     * @return Illuminate\Http\Response
     */
    public function destroy($provider)
    {
        $provider = Provider::findOrFail($provider);

        $provider->delete();

        return $this->successResponse($provider);
    }
}
