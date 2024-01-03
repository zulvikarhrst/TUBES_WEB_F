<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"/>

    <title>JurnalKu</title>

    <style>
        body {
            background-color: #ecf3f2;
        }

        .login-form {
            width: 50vw;
            height: 100vh;
            background-color: #56b9b3;
            padding-left: 4rem;
            padding-right: 4rem;
        }

        .illustration {
            width: 50vw;
        }

        .image {
            width: 30rem;
        }

        .btn {
            width: 100%;
            padding-top: 12px;
            padding-bottom: 12px;
            border-radius: 16px;
        }

        .form-control {
            border-radius: 16px;
            border: solid 2px grey;
        }
    </style>
</head>
<body>
<div class="d-flex flex-row">
    <div class="illustration pe-4 d-flex justify-content-center">
        <img class="image" src="../../assets/register-illustration.svg" alt=""/>
    </div>
    <div class="login-form d-flex flex-column justify-content-center">
        <h1 class="fw-bold text-light mb-4">Sign Up</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label fs-5 text-light">{{ __('Name') }}</label>
                <input
                    type="text"
                    class="form-control py-3 px-3 @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus
                    id="name"
                    placeholder="ex: John Lennon Abrams"
                />
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label fs-5 text-light">{{ __('Email Address') }}</label>
                <input
                    id="email"
                    type="email"
                    class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email"/>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label fs-5 text-light">{{ __('Password') }}</label>
                <input type="password" class="form-control py-3 px-3 mb-4 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" id="password" placeholder="ex: johnpassword" />
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password-confirm" class="form-label fs-5 text-light">{{ __('Confirm Password') }}</label>
                <input type="password" class="form-control py-3 px-3 mb-4" id="password-confirm" placeholder="ex: johnpassword" name="password_confirmation" required autocomplete="new-password" />
            </div>
            <button type="submit" class="btn btn-outline-light border border-light border-3 fw-bold mt-4">
                {{ __('Register') }}
            </button>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
