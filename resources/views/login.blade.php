<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login Dashboard POS </title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/Icon.png') }}" type="image/x-icon">

    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel='stylesheet'>

</head>

<body>
    <section class="container forms">
        @include('sweetalert::alert')
        <div class="form login">
            <div class="form-content">
                <header>Login POS System</header>
                <form action="{{ route('action-login') }}" method="post">
                    @csrf
                    <div class="field input-field">
                        <input type="email" placeholder="Email" class="input" name="email">
                    </div>
                    <div class="field input-field">
                        <input type="password" placeholder="Password" class="password" name="password">
                        <i class='bx bx-hide eye-icon'></i>
                    </div>
                    <div class="field button-field">
                        <button>Login</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- JavaScript -->
    <script src="{{ asset('js/script.js') }}"></script>
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
</body>

</html>
