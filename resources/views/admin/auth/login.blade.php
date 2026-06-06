<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <style>
        body {
            /* Background image HD dengan overlay gelap */
            background: linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)), url('{{ asset('images/background-login.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .login-card {
            width: 100%;
            max-width: 420px; /* Sedikit disesuaikan agar proporsinya pas */
            background: #ffffff;
            border: none;
            border-radius: 16px; /* Lengkungan sudut diperhalus sesuai gambar */
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.35);
            overflow: hidden;
        }

        .login-header {
            background-color: #05adfb;
            color: #fbfcfe;
            text-align: center;
            padding: 1.5rem;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .login-body {
            padding: 2.5rem 2rem;
        }

        .form-label {
            font-size: 0.95rem;
            color: #495057;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid #ced4da;
        }
        
        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(95, 95, 95, 0.25);
            border-color: #9b9a99;
        }

        .btn-warning {
            background-color: #05adfb;
            border-color: #ffffff;
            color: #ffffff;
            font-weight: 700;
            padding: 0.75rem;
            border-radius: 8px;
            font-size: 1.05rem;
            transition: all 0.2s ease;
        }

        .btn-warning:hover {
            background-color: #055bfb;
            border-color: #ffffff;
            color: #ffffff;
        }

        .demo-text {
            text-align: center;
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 2rem;
            border-top: 1px solid #dee2e6;
            padding-top: 1.2rem;
        }

        /* Alert error dibuat mirip persis dengan mockup box merah */
        .custom-alert {
            background-color: #f8d7da;
            color: #721c24;
            border-radius: 6px;
            padding: 12px 16px;
            font-size: 0.95rem;
            border: 1px solid #f5c6cb;
            margin-bottom: 1.5rem;
        }
        .custom-alert ul {
            list-style-type: disc;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="login-header">
            Admin Login
        </div>
        <div class="login-body">
            
            {{-- Alert Error --}}
            @if ($errors->has('login_error') || session('error'))
                <div class="custom-alert">
                    <ul class="mb-0 ps-3">
                        @if ($errors->has('login_error'))
                            <li>{{ $errors->first('login_error') }}</li>
                        @endif
                        @if(session('error'))
                            <li>{{ session('error') }}</li>
                        @endif
                    </ul>
                </div>
            @endif

            {{-- Form Login --}}
            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-warning w-100">Login</button>
            </form>
            
            <div class="demo-text">
                Demo Login : admin@example.com / password
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>