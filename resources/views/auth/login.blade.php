<x-layout>
    <x-slot:title>
        Sign In
    </x-slot:title>

    <div>
        <div>
            <div>
                <div>
                    <h1>Welcome Back</h1>

                    <form method="POST" action="/login">
                        @csrf

                        <!-- Email -->
                        <label>
                            <input type="email"
                                   name="email"
                                   placeholder="mail@example.com"
                                   value="{{ old('email') }}"
                                   required
                                   autofocus>
                            <span>Email</span>
                        </label>
                        @error('email')
                            <div>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Password -->
                        <label>
                            <input type="password"
                                   name="password"
                                   placeholder="••••••••"
                                   required>
                            <span>Password</span>
                        </label>
                        @error('password')
                            <div>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Remember Me -->
                        <div>
                            <label>
                                <input type="checkbox"
                                       name="remember">
                                <span>Remember me</span>
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit">
                                Sign In
                            </button>
                        </div>
                    </form>

                    <div>OR</div>
                    <p>
                        Don't have an account?
                        <a href="/register">Register</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout> 