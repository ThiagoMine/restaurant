@extends("system.layouts.app")

@section('title', "Login")

@section("content")

    <form method="POST" action="{{ route('login') }}" class="login-form">
        <div>
            @csrf
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <br>
            <label for="password">Senha:</label>
            <input type="password" name="password" id="password" required>
            <br>

            <div>
                <button type="submit" class="btn btn-primary btn-icon-split btn-lg">
                    <span class="icon text-white-50">
                        <i class="fas fa-flag"></i>
                    </span>
                    <span class="text">login</span>
                </button>
            </div>
        </div>
    </form>
    
@endsection
