@extends('layouts.app')

@section('content')
<!-- Styles -->
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">

<div class="container">
{!! Toastr::message() !!}
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Profile') }}</div>
        <div class="card-body p-5">
          <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-6 text-center">
              @if(Storage::disk('public')->exists('images/' . $user->profile) && $user->profile)
              <img style="height: 150px; width: 150px;"  src="{{ asset('storage/images/'. $user->profile) }}" />
              @else
              <img style="height: 150px; width: 150px;"  src="{{ asset('storage/images/default-profile.jpg') }}" />
              @endif
            </div>
            <div class="col-lg-8 col-md-12 col-sm-6">
              <div class="row">
                <label class="col-md-3 text-md-left">{{ __('Name') }}</label>
                <label class="col-md-9 text-md-left">
                  <i class="profile-text">{{$user->name}}</i>
                </label>
              </div>
              <div class="row">
                <label class="col-md-3 text-md-left">{{ __('Type') }}</label>
                @if($user->type == '0')
                <label class="col-md-9 text-md-left">
                  <i class="profile-text">Admin</i>
                </label>
                @else
                <label class="col-md-9 text-md-left">
                  <i class="profile-text">User</i>
                </label>
                @endif
              </div>
              <div class="row">
                <label class="col-md-3 text-md-left">{{ __('Email') }}</label>
                <label class="col-md-9 text-md-left">
                  <i class="profile-text">{{$user->email}}</i>
                </label>
              </div>
              <div class="row">
                <label class="col-md-3 text-md-left">{{ __('Phone') }}</label>
                <label class="col-md-9 text-md-left">
                  <i class="profile-text">{{$user->phone??'not available'}}</i>
                </label>
              </div>
              <div class="row">
                <label class="col-md-3 text-md-left">{{ __('Date of Birth') }}</label>
                <label class="col-md-9 text-md-left">
                  @if($user->dob)
                  <i class="profile-text">{{date('Y/m/d', strtotime($user->dob))}}</i>
                  @else
                  <i class="profile-text">not available</i>
                  @endif
                </label>
              </div>
              <div class="row">
                <label class="col-md-3 text-md-left">{{ __('Address') }}</label>
                <label class="col-md-9 text-md-left">
                  <i class="profile-text">{{$user->address??'not available'}}</i>
                </label>
              </div>
              <div class="pt-4">
                <a type="button" class="btn btn-primary" href="/user/profile/edit">
                  {{ __('Edit Profile') }}
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection