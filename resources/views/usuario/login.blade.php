
@extends('index')

@section('content')

<body class="main-bg">
    <div class="login-container text-c animated flipInX">
            <div class="container-content">
                <form class="form" method="POST" action="">
                    @csrf
                    <h1 class="text-center" style="color: white">Login</h1>
                    <div class="mb-3">
                        <input placeholder="Seu nome" type="text" value="{{ old('nome') }}" class="form-control @error('nome') is-invalid @enderror"
                            name="nome">
                        @if ($errors->has('nome'))
                            <div class="invalid-feedback"> {{ $errors->first('nome') }}</div>
                        @endif
                    </div>
            
                    <button type="submit" class="btn btn-success btn-lg">GRAVAR</button>
                    <h1 class="text-center" style="color: white">Login</h1>
                </form>
            </div>
        </div>
</body>

@endsection