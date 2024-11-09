<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarsController extends Controller
{
    public function index()
    {
        // $cars = Cars::paginate(10);
        $cardata = Car::all();
        return view('cars.list', compact('cardata'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function edit($id)
    {
        $car = Car::find($id);
        return view('cars.edit', compact('car'));
    }

    public function store(Request $req)
    {
        $req->validate([
            'make' => ['required', 'string', 'max:30'],
            'model' => ['required', 'string'],
            'year' => ['required', 'integer', 'digits:4'],
            'color' => ['required', 'string'],
            'price' => ['required', 'integer'],
        ],[
            'make.string' => 'Name must be string',
            'model.required' => 'Mention the model name',
            'year.integer' => 'Year must be numbers',
        ]);

        if(Car::create($req->all()))
        {
            return redirect()->route('cars.index')->with('success', 'Data Stored Successfully');
        }
        return redirect()->route('cars.create')->with('error', 'Failed to Store');
        // dd($req->all());

    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'make' => ['required', 'string', 'max:30'],
            'model' => ['required', 'string'],
            'year' => ['required', 'integer', 'digits:4'],
            'color' => ['required', 'string'],
            'price' => ['required', 'integer'],
        ], [
            'make.string' => 'Name must be a string',
            'model.required' => 'Mention the model name',
            'year.integer' => 'Year must be a number',
        ]);

        $car = Car::find($id);
        if (!$car) {
            return redirect()->route('cars.index')->with('error', 'Car not found');
        }
        $car->update($req->all());

        return redirect()->route('cars.index')->with('success', 'Data Updated Successfully');
    }


    public function destroy($id)
    {
        $car = Car::find($id);

        if($car->delete()) {
            return redirect()->route('cars.index')->with('success', 'Data Deleted Successfully');
        }

        return redirect()->route('cars.index')->with('error', 'Failed to Delete');
    }
}
