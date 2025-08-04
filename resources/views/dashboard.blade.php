@extends('layouts.app')

@section('content')
    <div class="card bg-primary-gt text-white overflow-hidden shadow-none">
        <div class="card-body">
            <div class="row justify-content-between align-items-center">
                <div class="col-sm-6">
                    <div class="d-flex align-items-center mb-7">
                        <h5 class="fw-semibold fs-5 text-white mb-0 d-flex align-items-center" style="line-height: 45px;">
                            {{ __('Selamat Datang, :name!', ['name' => Auth::user()->name]) }}
                        </h5>
                    </div>

                    <!-- Tombol Logout -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-light text-primary fw-semibold">
                            Logout
                        </button>
                    </form>
                </div>

                <div class="col-sm-5">
                    <div class="position-relative mb-n7 text-end">
                        <img src="{{ asset('assets/images/backgrounds/welcome-bg2.png') }}" alt="modernize-img" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
