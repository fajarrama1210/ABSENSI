@extends('layouts.app')

@section('title', 'Landing Page - Absensi Siswa')



@section('content')
<section class="main-content row d-flex justify-content-center">
    <div class="content-wrapper col">
        <div class="text-section">
            <h2>Absensi Lebih Mudah dan Cepat</h2>
            <p>Aplikasi kami memungkinkan Anda untuk melakukan absensi kapan saja dan di mana saja, dengan mudah dan efisien.</p>


                <div class="buttons align-items-center">
                    <a href="{{ route('login') }}" class="btn m-4">Login</a>
                    <a href="{{ route('register') }}" class="btn register">Register</a>
                </div>


        </div>
    </div>
    <div class="image-section col">
        <img src="{{ asset('assets/dist/images/backgrounds/welcome-bg2.png') }}" alt="Karikatur orang absensi" class="karikatur">
    </div>
</section>
@endsection
