@extends('app')

@section('content')

    <div class="row" id="login">
        <div class="columns large-8 medium-8 small-12 large-centered medium-centered">
            <div class="panel">
                <h3>Login</h3>
                <div class="panel">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="awesome-form" role="form" method="POST" action="/auth/register">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="row form-input-group">
                            <input type="text" name="name" value="{{ old('name') }}" />
                            <label for="name">Name</label>
                        </div>

                        <div class="row form-input-group">
                            <input type="email" name="email" value="{{ old('email') }}" />
                            <label for="email">E-Mail Address</label>
                        </div>

                        <div class="row form-input-group">
                            <input type="password" name="password">
                            <label for="password">Password</label>
                        </div>

                        <div class="row form-input-group">
                            <input type="password" name="password_confirmation">
                            <label for="password_confirmation">Confirm Password</label>
                        </div>

                        <div class="row">
                            <button type="submit" class="button tiny round right">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
