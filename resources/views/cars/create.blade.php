@extends('layouts.app')
@section('content')
    <section class="car-creation">
        <div class="card">
            <div class="card-header">
                <div class="title">Car Creation</div>
                <div class="back-route"><a href="{{ route('cars.index') }}"><strong><<</strong> Back</a></div>
            </div>
            <div class="card-body">
                <form action="{{ route('cars.store') }}" method="POST">
                    @csrf
                    <div class="wrapper">
                        <div class="box box-1">
                            <div class="form-control">
                                <label for="">Make<span>*</span></label>
                                <input type="text" name="make" placeholder="Enter the Brand Name" value="{{ old('make') }}" />
                                    @if($errors->has('make'))
                                        <p class="text-orange-700">{{$errors->first('make')}}</p>
                                    @endif
                            </div>
                            <div class="form-control">
                                <label for="">Model<span>*</span></label>
                                <input type="text" name="model" placeholder="Enter the Model Name" value="{{ old('model') }}" />
                                    @if($errors->has('model'))
                                        <p class="text-orange-700">{{$errors->first('model')}}</p>
                                    @endif
                            </div>
                            <div class="form-control">
                                <label for="">Year<span>*</span></label>
                                <input type="text" name="year" placeholder="Enter the Year" value="{{ old('year') }}" />
                                    @if($errors->has('year'))
                                        <p class="text-orange-700">{{$errors->first('year')}}</p>
                                    @endif
                            </div>
                            <div class="form-control">
                                <label for="">Color<span>*</span></label>
                                <input type="text" name="color" placeholder="Enter the Color" value="{{ old('color') }}" />
                                    @if($errors->has('color'))
                                        <p class="text-orange-700">{{$errors->first('color')}}</p>
                                    @endif
                            </div>
                        </div>
                        <div class="box box-2">
                            <div class="form-control">
                                <label for="">Price<span>*</span></label>
                                <input type="text" name="price" placeholder="Enter the Price" value="{{ old('price') }}" />
                                @if($errors->has('price'))
                                    <p class="text-orange-700">{{$errors->first('price')}}</p>
                                @endif
                            </div>
                            <div class="form-control">
                                <label for="">Country</label>
                                <select name="country" >
                                    <option value="">Select Country</option>
                                    <option value="India">India</option>
                                </select>
                            </div>
                            <div class="form-control">
                                <label for="">State</label>
                                <select name="state" >
                                    <option value="">Select State</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                </select>
                            </div>
                            <div class="form-control">
                                <label for="city">City</label>
                                <select name="city" >
                                    <option value="">Select City</option>
                                    <option value="Chennai">Chennai</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="save-btn">
                        <button type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

