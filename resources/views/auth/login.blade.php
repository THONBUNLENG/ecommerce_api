<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@300;400;600&display=swap');

        .login-form {
            width: 100%;
            max-width: 420px;
            background: #FEFEFE;
            box-shadow: 0px 24px 64px rgba(15, 15, 15, 0.08);
            border-radius: 12px;
            padding: 48px;
            box-sizing: border-box;
            font-family: 'Inter', 'Helvetica Neue', Arial, sans-serif;
        }

        .brand-name {
            font-family: 'Playfair Display', 'Didot', serif;
            font-size: 18px;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #0f0f0f;
            text-align: center;
            margin-bottom: 8px;
        }

        .welcome-title {
            font-family: 'Playfair Display', 'Didot', serif;
            font-size: 32px;
            font-weight: 700;
            color: #0f0f0f;
            text-align: center;
            margin: 0 0 12px 0;
        }

        .subtitle {
            font-size: 14px;
            color: #666666;
            text-align: center;
            margin-bottom: 32px;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: #0f0f0f;
            margin-bottom: 8px;
        }

        .input-field {
            width: 100%;
            height: 48px;
            background: #F9FAFB;
            border: 1px solid #E5E7EB;
            border-radius: 8px;
            padding: 0 16px;
            font-size: 14px;
            color: #0f0f0f;
            box-sizing: border-box;
            transition: all 0.2s ease;
            -webkit-appearance: none;
            appearance: none;
        }

        .input-field:focus {
            outline: none;
            background: #FFFFFF;
            border-color: #D4AF37;
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.15);
        }

        .input-field:-webkit-autofill,
        .input-field:-webkit-autofill:hover,
        .input-field:-webkit-autofill:focus {
            -webkit-box-shadow: 0 0 0px 1000px #F9FAFB inset;
            -webkit-text-fill-color: #0f0f0f;
            border-color: #D4AF37;
            transition: background-color 5000s ease-in-out 0s;
        }

        .password-container {
            position: relative;
            width: 100%;
        }

        .password-input {
            padding-right: 48px !important;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            opacity: 0.4;
            padding: 0;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.2s;
        }

        .password-toggle:hover { opacity: 0.8; }

        .password-toggle svg {
            width: 20px;
            height: 20px;
            stroke: #0f0f0f;
            display: block;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
            font-size: 13px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            color: #4B5563;
            cursor: pointer;
            gap: 8px;
        }

        .remember-me input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #0f0f0f;
            cursor: pointer;
        }

        .forgot-password {
            color: #4B5563;
            text-decoration: none;
            border-bottom: 1px solid transparent;
            transition: border-color 0.2s;
        }

        .forgot-password:hover { border-color: #4B5563; }

        .btn-signin {
            width: 100%;
            height: 50px;
            background: #0F0F0F;
            color: #FFFFFF;
            border: 1px solid #0F0F0F;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            font-family: 'Inter', sans-serif;
        }

        .btn-signin:hover {
            background: #D4AF37;
            border-color: #D4AF37;
            color: #FFFFFF;
            box-shadow: 0px 8px 20px rgba(212, 175, 55, 0.25);
        }

        .divider {
            height: 1px;
            background: #E8E6E1;
            margin: 28px 0;
        }

        .form-footer {
            text-align: center;
            font-size: 13px;
            color: #666666;
        }

        .create-account-link {
            color: #D4AF37;
            font-weight: 600;
            text-decoration: none;
            margin-left: 4px;
        }

        .create-account-link:hover { text-decoration: underline; }
    </style>

    <div class="min-h-screen flex items-center justify-center px-4 py-12"
         style="background: linear-gradient(135deg, #faf8f5 0%, #f5f3f0 100%);">
        <div class="fixed inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -left-40 top-0 w-[400px] h-full opacity-15 blur-sm"
                 style="background: #8b7355;"></div>
            <div class="absolute -right-40 top-0 w-[400px] h-full opacity-15 blur-sm"
                 style="background: #8b7355;"></div>
        </div>


        <div class="login-form relative z-10">


            <div class="text-center mb-8">
                <x-authentication-card-logo />
            </div>


            <h2 class="welcome-title">Welcome Back</h2>
            <p class="subtitle">Sign in to your account to continue shopping.</p>

            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 text-sm text-center font-medium text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input
                        id="email"
                        class="input-field"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="Enter your email"
                    >
                </div>

                <div class="form-group password-container">
                    <label for="password" class="form-label">Password</label>
                    <input
                        id="password"
                        class="input-field password-input"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Enter your password"
                    >
                    <button type="button" class="password-toggle" onclick="togglePassword()" tabindex="-1">
                        <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943
                                     9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" name="remember" id="remember_me">
                        <span>Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="forgot-password" href="{{ route('password.request') }}">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <button type="submit" class="btn-signin">Sign In</button>

                <div class="divider"></div>

                <div class="form-footer">
                    Don't have an account?
                    <a class="create-account-link" href="{{ route('register') }}">Create account</a>
                </div>

            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>
</x-guest-layout>
