<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::paginate(15);
        return view("home", compact("customers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view( "crear");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'bail|required|max:255',
                'direccion' =>  'bail|required|max:255',
                'telefono' =>  'bail|required|max:11',
                'email' => 'required|email|max:255'            
            ]);
        }catch (\Illuminate\Validation\ValidationException $ex) {
            return $ex->validator->errors();
        }
        $customer = Customer::create($request->all());
        return redirect()->route('clientes.index')->with('mensaje','El cliente ' . $customer->id . ' ha sido añadido con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view("edit", compact("customer"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer::findOrFail($id);
        try {
            $request->validate([
                'nombre' => 'bail|required|max:255',
                'direccion' =>  'bail|required|max:255',
                'telefono' =>  'bail|required|max:11',
                'email' => 'required|email|max:255'            
            ]);
        }catch (\Illuminate\Validation\ValidationException $ex) {
            return $ex->validator->errors();
        }
        $customer->update($request->all());
        return redirect()->route('clientes.index')->with('mensaje','El cliente ' . $id . ' ha sido modifcado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return redirect()->route('clientes.index')->with('mensaje', 'El cliente ' . $id . ' ha sido eliminado con éxito.');
    }
    

    public function confirmar_borrado(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view("confirmar", compact("customer"));
    }

    /*
EJERCICIO 7: Consulta de los pedidos
El botón “Pedidos” que hay en la página principal asociado a cada cliente, navegará a la
vista de pedidos del cliente.
Esta vista, mostrará:
● El nombre del cliente arriba del todo
● La lista de todos sus pedidos, ordenados de más reciente a menos reciente
● De cada pedido se indicará fecha y hora
    */
    public function gestionar_pedidos(string $id){
        $customer = Customer::findOrFail($id);
        $pedidos = $customer->orders()->orderBy('fecha', 'asc')->orderBy('hora', 'asc')->get();
        $pizzas = $pedidos->flatMap->pizzas; 
        return view('pedidos', compact('pedidos', 'customer', 'pizzas'));
    }

}
