<x-layout>
    <x-slot:title>
        Register
    </x-slot:title>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div>
            <div>
                <div class="card p-4 shadow" style="width: 40rem;">
                    <div class="mb-5 row">
                        <h1>Create Account</h1>
                    </div>

                    <form method="POST" action="/register" class="row g-3">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="John Doe"
                                   value="{{ old('name') }}"
                                   required>
                            </div>
                        </div>
                        @error('name')
                            <div>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Email -->
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email"
                                   name="email"
                                   class="form-control"
                                   placeholder="mail@example.com"
                                   value="{{ old('email') }}"
                                   required>
                            </div>
                        </div>
                        @error('email')
                            <div>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror

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
                        @error('password')
                            <div>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror

                        <!-- Password Confirmation -->
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password"
                                   name="password_confirmation"
                                   class="form-control"
                                   placeholder="••••••••"
                                   required>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="btn btn-outline-success">
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