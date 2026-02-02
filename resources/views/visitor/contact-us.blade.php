@extends('layouts.master')

@section('title', 'تواصل معنا')

@section('content')

<div class="container">
    <div class="story-page">
        <div class="about">
            <div class="about1">
                <h3>تواصل معنا</h3>
            </div>
            <img src="{{ asset('img/a.png') }}" alt="">
        </div>

        <div class="contact-container">
            <div class="contact-form">
                <img src="{{ asset('img/logo.png') }}" alt="">

                @if(session('success'))
                    <p style="color:green">{{ session('success') }}</p>
                @endif

                <form method="POST" action="{{ route('contact_us.store') }}">
                    @csrf

                    <div class="form-group">
                        <label>الإيميل</label>
                        <input type="email" name="email" value="{{ old('email') }}">
                        @error('email') <small>{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group">
                        <label>الاسم</label>
                        <input type="text" name="name" value="{{ old('name') }}">
                        @error('name') <small>{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group">
                        <label>العنوان</label>
                        <input type="text" name="address" value="{{ old('address') }}">
                        @error('address') <small>{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group">
                        <label>محتوى الرسالة</label>
                        <textarea name="message" style="height:125px">{{ old('message') }}</textarea>
                        @error('message') <small>{{ $message }}</small> @enderror
                    </div>

                    <button type="submit" class="send-btn">أرسل</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
