<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return json_encode(['customers' => $customers]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'document_number' => 'required|string|max:255|unique:customers,document_number',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'birthday' => 'required|date',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);

        $customer = new Customer();
       
        $customer->document_number = $validatedData['document_number'];
        $customer->first_name = $validatedData['first_name'];
        $customer->last_name = $validatedData['last_name'];
        $customer->address = $validatedData['address'];
        $customer->birthday = $validatedData['birthday'];
        $customer->phone_number = $validatedData['phone_number'];
        $customer->email = $validatedData['email'];
        $customer->save();
        
        /*$customers = DB::table('customers')
        ->orderBy('id')
        ->get(); 
        
        return json_encode(['customer' => $customers]); 
        */
        return response()->json(['customer' => $customer], 201);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::find($id);
        if (is_null($customer)) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }
        return response()->json(['customer' => $customer], 200);
    }
       /* if(is_null($customer)){
            return abort(404);
        }

        return json_encode(['customer'=> $customer]);*/
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'document_number' => 'required|string|max:255|unique:customers,document_number,' . $id,
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'birthday' => 'required|date',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);

        $customer = Customer::find($id);
        if (is_null($customer)) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        $customer->document_number = $validatedData['document_number'];
        $customer->first_name = $validatedData['first_name'];
        $customer->last_name = $validatedData['last_name'];
        $customer->address = $validatedData['address'];
        $customer->birthday = $validatedData['birthday'];
        $customer->phone_number = $validatedData['phone_number'];
        $customer->email = $validatedData['email'];
        $customer->save();

        return response()->json(['customer' => $customer], 200);
    }
        /*$customer = Customer::find($id);
       
        $customer->document_number = $request->document_number;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->address = $request->address;
        $customer->birthday = $request->birthday;
        $customer->phone_number = $request->phone_number;
        $customer->email = $request->email;
        $customer->save();

        $customers = DB::table('customers')
        ->orderBy('id')
        ->get();

        return json_encode(['customer'=> $customer]);*/

    public function destroy(string $id)
    {
        {
            $customer = Customer::find($id);
            if (is_null($customer)) {
                return response()->json(['message' => 'Cliente no encontrado'], 404);
            }
    
            $customer->delete();
            return response()->json(['message' => 'Cliente eliminado con éxito'], 200);
        }
    
        /*$customer = Customer::find($id);
        $customer->delete();

        $customers = DB::table('customers')
        ->orderBy('id')
        ->get();

      return json_encode(['customer'=> $customers]);*/
    }
}
