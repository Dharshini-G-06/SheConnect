<!DOCTYPE html>

<html>
<head>

```
<title>Forgot Password</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

    body {
        background: #f5f5ff;
    }

    .forgot-box {
        max-width: 450px;
        margin: 80px auto;
    }

    .card {
        border: none;
        border-radius: 20px;
    }

    .card-header {
        background: linear-gradient(135deg, #6a1b9a, #ab47bc);
        color: white;
        border-radius: 20px 20px 0 0 !important;
        padding: 25px;
    }

    .btn-purple {
        background: #6a1b9a;
        color: white;
        border: none;
        padding: 12px;
        border-radius: 10px;
    }

    .btn-purple:hover {
        background: #4a148c;
        color: white;
    }

    .back-link {
        color: #6a1b9a;
        text-decoration: none;
        font-weight: 500;
    }

</style>
```

</head>

<body>

<div class="container">

```
<div class="forgot-box">

    <div class="card shadow">

        <div class="card-header text-center">

            <h3 class="mb-0">
                🔐 Forgot Password
            </h3>

            <small>
                Enter your registered email to receive OTP
            </small>

        </div>


        <div class="card-body p-4">

            {{-- Success Message --}}
            @if(session('success'))

                <div class="alert alert-success">
                    {{ session('success') }}
                </div>

            @endif


            {{-- Error Message --}}
            @if(session('error'))

                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>

            @endif


            {{-- Validation Errors --}}
            @if($errors->any())

                <div class="alert alert-danger">

                    @foreach($errors->all() as $error)

                        <div>{{ $error }}</div>

                    @endforeach

                </div>

            @endif


            <form action="{{ route('forgot.send') }}" method="POST">

                @csrf

                <label class="form-label">
                    📧 Email Address
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control mb-3"
                    placeholder="Enter your registered email"
                    value="{{ old('email') }}"
                    required
                >


                <button
                    type="submit"
                    class="btn btn-purple w-100">

                    📩 Send OTP

                </button>

            </form>


            <div class="text-center mt-4">

                <a href="{{ route('login') }}" class="back-link">

                    ⬅ Back to Login

                </a>

            </div>

        </div>

    </div>

</div>
```

</div>

</body>
</html>
