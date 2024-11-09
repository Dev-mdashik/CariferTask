@extends('layouts.app')
@section('content')
    <section class="car-creation">
        <div class="card">
            <div class="card-header">
                <div class="title">Car Lists</div>
                <div class="back-route"><a href="{{ route('cars.create') }}">Create</a></div>
            </div>
            <div class="card-body">
                @if(!$cardata->isEmpty())
                <div class="datatable">
                    <table>
                        <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Make</th>
                                <th>Model</th>
                                <th>Year</th>
                                <th>Color</th>
                                <th>Price</th>
                                <th>Country</th>
                                <th>State</th>
                                <th>City</th>
                                @if(Auth()->user()->id == '1')
                                <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cardata as $key => $car)
                            <tr>
                                <td> <b>{{$key + 1}}</b></td>
                                <td>{{$car->make}}</td>
                                <td>{{$car->model}}</td>
                                <td>{{$car->year}}</td>
                                <td>{{$car->color}}</td>
                                <td>{{$car->price}}</td>
                                <td>{{$car->country ? $car->country : '--'}}</td>
                                <td>{{$car->state ? $car->state : '--'}}</td>
                                <td>{{$car->city ? $car->city : '--'}}</td>
                                @if(Auth()->user()->id == '1')
                                    <td>
                                        <div class="actions">
                                            <a href="{{ route('cars.edit', $car->id) }}">
                                                <button class="edit"><i class="fa-solid fa-pen-to-square"></i></button>
                                            </a>
                                            <form action="{{ route('cars.destroy', $car) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <p>No Data to Show</p>
                @endif
            </div>
        </div>
    </section>
@endsection

