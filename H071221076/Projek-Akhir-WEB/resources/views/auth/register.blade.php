<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Learning - Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #C7E9B0;
            font-family: 'Arial', sans-serif;
        }

        .container {
            padding-top: 60px;
            margin-bottom: 5%;
        }

        .card-register {
            box-shadow: -3px -7px 31px 13px rgba(0, 168, 64, 0.07);
            width: 100%;
            background: #DDFFBB;
            padding: 0.5em;
            border-radius: 30px;
            height: 100%;
            max-width: 650px;
            margin: auto;
        }

        .card-header {
            text-align: center;
            font-size: 24px;
            color: #4c7d5a;
            border-bottom: 1px solid #4c7d5a;
            font-weight: bold;
            margin-top: 0px;
        }

        .card-body {
            padding: 2em;
        }

        .form-register {
            width: 100%;
        }

        .form-input {
            padding: 5px;
            border-radius: 10px;
            border: 1px solid #4D4C7D;
            width: 100%;
            box-sizing: border-box;
        }

        .form-select {
            padding: 5px;
            border-radius: 10px;
            border: 1px solid #4D4C7D;
            width: 100%;
            box-sizing: border-box;
        }

        .btn-register {
            width: 40%;
            padding: 8px;
            border-radius: 25px;
            background-color: #6ab277;
            border: none;
            color: #ffffff;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-register:hover {
            background-color: #628367;
        }

        .btn-have {
            text-decoration: none;
            color: #6c757d;
        }

        .btn-have:hover {
            color: #005bab;
        }

        .custom-container {
    display: flex;
    align-items: center;
}

.custom-container .btn-register {
    margin-right: 10px;
}


    </style>
</head>

<body>
    <div class="container">
        <div class="card card-register">
            <div class="col-1">
                <p class="text-center mt-3">
                    <a href="/" class="text-decoration-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                            class="bi bi-arrow-left" viewBox="0 0 16 16" style="fill: rgb(58, 26, 26);">
                            <path fill-rule="evenodd"
                                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                        </svg>
                    </a>
                </p>
            </div>
            <div class="card-header">REGISTRASI</div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}" class="form-register">
                    @csrf

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input id="name" type="text"
                                class="form-control form-input @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="role" class="form-label">Role</label>
                            <select id="role" class="form-control form-select" name="role">
                                <option value="select"> </option>
                                <option value="pengajar">Pengajar</option>
                                <option value="siswa">Siswa</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" type="email"
                                class="form-control form-input @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password"
                            class="form-control form-input @error('password') is-invalid @enderror" name="password"
                            required autocomplete="new-password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control form-input"
                            name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="custom-container">
                        <button type="submit" class="btn btn-primary btn-register">{{ __('Register') }}</button>

                        <div class="mt-2">
                            Already have an account? <a href="{{ route('login') }}" class="btn-have">Login here</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
