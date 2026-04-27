<x-layout>
    <x-slot:title>
        Sign In
    </x-slot:title>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div>
            <div>
                <div class="card p-4 shadow" style="width: 40rem;">
                    <div class="mb-5 row"><h1>Welcome Back</h1></div>

                    <form method="POST" action="/login" class="row g-3">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email"
                                    name="email"
                                    class="form-control"
                                    placeholder="mail@example.com"
                                    value="{{ old('email') }}"
                                    required
                                    autofocus>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password"
                                    name="password"
                                    class="form-control"
                                    placeholder="••••••••"
                                    required>
                            </div>
                        </div>

                        @error('email')
                            <div>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
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
                            <button type="submit" class="btn btn-outline-success">
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