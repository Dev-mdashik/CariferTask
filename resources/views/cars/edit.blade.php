@extends('layouts.app')
@section('content')
    <section class="car-creation">
        <div class="card">
            <div class="card-header">
                <div class="title">Car Updation</div>
                <div class="back-route"><a href="{{ route('cars.index') }}"><strong><<</strong> Back</a></div>
            </div>
            <div class="card-body">
                <form action="{{ route('cars.update', $car->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="wrapper">
                        <div class="box box-1">
                            <div class="form-control">
                                <label for="">Make<span>*</span> </label>
                                <input type="text" name="make" placeholder="Enter the Brand Name" value="{{ $car->make }}" />
                                    @if($errors->has('make'))
                                        <p class="text-orange-700">{{$errors->first('make')}}</p>
                                    @endif
                            </div>
                            <div class="form-control">
                                <label for="">Model<span>*</span> </label>
                                <input type="text" name="model" placeholder="Enter the Model Name" value="{{ $car->model }}" />
                                    @if($errors->has('model'))
                                        <p class="text-orange-700">{{$errors->first('model')}}</p>
                                    @endif
                            </div>
                            <div class="form-control">
                                <label for="">Year<span>*</span> </label>
                                <input type="text" name="year" placeholder="Enter the Year" value="{{ $car->year }}" />
                                    @if($errors->has('year'))
                                        <p class="text-orange-700">{{$errors->first('year')}}</p>
                                    @endif
                            </div>
                            <div class="form-control">
                                <label for="">Color<span>*</span> </label>
                                <input type="text" name="color" placeholder="Enter the Color" value="{{ $car->color }}" />
                                    @if($errors->has('color'))
                                        <p class="text-orange-700">{{$errors->first('color')}}</p>
                                    @endif
                            </div>
                        </div>
                        <div class="box box-2">
                            <div class="form-control">
                                <label for="">Price<span>*</span> </label>
                                <input type="text" name="price" placeholder="Enter the Price" value="{{ $car->price }}" />
                                @if($errors->has('price'))
                                    <p class="text-orange-700">{{$errors->first('price')}}</p>
                                @endif
                            </div>
                            <div class="form-control">
                                <label for="">Country</label>
                                <select name="country" >
                                    <option value="">Select Country</option>
                                    <option value="India" {{ old('country', $car->country) == 'India' ? 'selected' : '' }}>India</option>
                                </select>
                            </div>
                            <div class="form-control">
                                <label for="">State</label>
                                <select name="state" >
                                    <option value="">Select State</option>
                                    <option value="Tamil Nadu" {{ old('country', $car->country) == 'India' ? 'selected' : '' }}>Tamil Nadu</option>
                                </select>
                            </div>
                            <div class="form-control">
                                <label for="city">City</label>
                                <select name="city" >
                                    <option value="">Select City</option>
                                    <option value="Chennai" {{ old('country', $car->country) == 'India' ? 'selected' : '' }}>Chennai</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="save-btn">
                        <button type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

