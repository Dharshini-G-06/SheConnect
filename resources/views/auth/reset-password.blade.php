<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Reset Password - SheConnect</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #f3e5f5, #ede7f6);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .reset-box {
            width: 430px;
            max-width: 95%;
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,.12);
        }

        .reset-title {
            color: #6a1b9a;
            font-weight: bold;
        }

        .form-label {
            font-weight: 600;
            color: #555;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
        }

        .btn-purple {
            background: linear-gradient(135deg, #6a1b9a, #ab47bc);
            color: white;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
        }

        .btn-purple:hover {
            background: linear-gradient(135deg, #4a148c, #8e24aa);
            color: white;
        }

        .back-link {
            color: #6a1b9a;
            text-decoration: none;
            font-weight: 600;
        }
    </style>

</head>

<body>

<div class="reset-box">

    <h3 class="text-center reset-title mb-2">
        🔐 Reset Password
    </h3>

    <p class="text-center text-muted mb-4">
        Create a new password for your SheConnect account
    </p>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('reset.update') }}" method="POST">

        @csrf

        <label class="form-label">
            Email
        </label>

        <input
            type="email"
            name="email"
            class="form-control mb-3"
            placeholder="Enter your registered email"
            value="{{ session('reset_email') }}"
            required
        >

        <label class="form-label">
            New Password
        </label>

        <input
            type="password"
            name="password"
            class="form-control mb-3"
            placeholder="Enter New Password"
            required
        >

        <label class="form-label">
            Confirm Password
        </label>

        <input
            type="password"
            name="password_confirmation"
            class="form-control mb-4"
            placeholder="Confirm New Password"
            required
        >

        <button
            type="submit"
            class="btn btn-purple w-100">

            Save Password

        </button>

    </form>

    <div class="text-center mt-4">

        <a href="{{ route('login') }}" class="back-link">

            ⬅ Back to Login

        </a>

    </div>

</div>

</body>

</html>