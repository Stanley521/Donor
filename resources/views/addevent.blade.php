@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/view/addevent.css') }}" >
<link rel="stylesheet" type="text/css" href="{{ asset('css/map.css') }}" >
<div class="card">
    <div class="card-header">{{ __('Add Event') }}</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        
        @if(Auth::user()->user_type == 'User')
        <div class="">
            {{ __('You are not allowed to be here! Please contact our administrator') }}
        </div>
        @else
        <div class="">
            <form method="POST" action="{{ route('postevent') }}">
            @csrf
                <div class="form-group">
                    <label for="location">{{ __('Location Name:') }}</label>
                    <input name="location" type="text" class="form-control" id="location" class="form-control @error('location') is-invalid @enderror" required autofocus>
                    @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">{{ __('Address:') }}</label>
                    <input name="address" type="text" class="form-control" id="address" class="form-control @error('address') is-invalid @enderror" required>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="latitude">{{ __('Latitude:') }}</label>
                    <input name="latitude" type="text" class="form-control" id="latitude" class="form-control @error('latitude') is-invalid @enderror" required>
                    @error('latitude')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="longitude">{{ __('Longitude:') }}</label>
                    <input name="longitude" type="text" class="form-control" id="longitude" class="form-control @error('longitude') is-invalid @enderror" required>
                    @error('longitude')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="event">{{ __('Event Name:') }}</label>
                    <input name="event" type="text" class="form-control" id="event" class="form-control @error('event') is-invalid @enderror" required>
                    @error('event')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">{{ __('Event Description:') }}</label>
                    <input name="description" type="text" class="form-control" id="description" class="form-control @error('description') is-invalid @enderror" required>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="urgent">{{ __('Urgency:') }}</label>
                    <div class="d-flex">
                        <input type="radio" name="urgent" value="0"  class="@error('urgency') is-invalid @enderror" required> No<br>
                        <input type="radio" name="urgent" value="1"> Yes<br>
                    </div>
                    @error('urgency')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="accessible">{{ __('Accessible Until:') }}</label>
                    <input name="accessible" type="date" class="form-control" id="accessible" class="@error('accessible') is-invalid @enderror" required>
                    @error('accessible')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Add Event') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        @endif
    </div>
</div>
@endsection