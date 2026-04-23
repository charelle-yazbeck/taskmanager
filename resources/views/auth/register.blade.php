<x-layout>
    <x-slot:title>
        Register
    </x-slot:title>

    <div>
        <div>
            <div>
                <div>
                    <h1>Create Account</h1>

                    <form method="POST" action="/register">
                        @csrf

                        <!-- Name -->
                        <label>
                            <input type="text"
                                   name="name"
                                   placeholder="John Doe"
                                   value="{{ old('name') }}"
                                   required>
                            <span>Name</span>
                        </label>
                        @error('name')
                            <div>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Email -->
                        <label>
                            <input type="email"
                                   name="email"
                                   placeholder="mail@example.com"
                                   value="{{ old('email') }}"
                                   required>
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

                        <!-- Password Confirmation -->
                        <label>
                            <input type="password"
                                   name="password_confirmation"
                                   placeholder="••••••••"
                                   required>
                            <span>Confirm Password</span>
                        </label>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit">
                                Register
                            </button>
                        </div>
                    </form>
 
                    <div>OR</div>
                    <p>
                        Already have an account?
                        <a href="/login">Sign in</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>