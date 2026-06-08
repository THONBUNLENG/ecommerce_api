<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=Inter:wght@300;400;600&display=swap');

        :root {
            --primary: #0f0f0f;
            --secondary: #d4af37;
            --border-med: #E5E7EB;
            --text-primary: #1a1a1a;
            --text-secondary: #4a4a4a;
            --ff-display: 'Playfair Display', Georgia, serif;
            --ff-body: 'Inter', system-ui, sans-serif;
        }

        .ls-input {
            width: 100%;
            height: 52px;
            background: #F9FAFB;
            border: 1px solid var(--border-med);
            border-radius: 8px;
            padding: 0 16px;
            font-size: 15px;
            font-family: var(--ff-body);
            color: var(--text-primary);
            box-sizing: border-box;
            transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
            -webkit-appearance: none;
            appearance: none;
        }

        .ls-input:focus {
            outline: none;
            background: #fff;
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.15);
        }

        .ls-input:-webkit-autofill,
        .ls-input:-webkit-autofill:hover,
        .ls-input:-webkit-autofill:focus {
            -webkit-box-shadow: 0 0 0px 1000px #F9FAFB inset;
            -webkit-text-fill-color: var(--text-primary);
            border-color: var(--secondary);
            transition: background-color 5000s ease-in-out 0s;
        }

        .ls-btn {
            display: block;
            width: 100%;
            height: 52px;
            margin-top: 16px;
            background: var(--primary);
            color: #fff;
            border: 2px solid var(--primary);
            border-radius: 8px;
            font-family: var(--ff-body);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            cursor: pointer;
            transition: background 0.3s ease, border-color 0.3s ease,
                        color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
        }

        .ls-btn:hover {
            background: var(--secondary);
            border-color: var(--secondary);
            color: var(--primary);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.28);
        }

        .ls-btn:active {
            transform: translateY(0);
            box-shadow: none;
        }

        .ls-label {
            display: block;
            margin-bottom: 8px;
            font-family: var(--ff-body);
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--text-primary);
        }

        .ls-back {
            font-family: var(--ff-body);
            font-size: 14px;
            font-weight: 600;
            color: var(--secondary);
            text-decoration: none;
            transition: opacity 0.2s;
        }

        .ls-back:hover { opacity: 0.7; text-decoration: underline; }
    </style>

    {{-- Page background --}}
    <div class="min-h-screen flex items-center justify-center px-4 py-12"
         style="background: linear-gradient(135deg, #faf8f5 0%, #f5f3f0 100%);">

        {{-- Decorative side panels --}}
        <div class="fixed inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -left-40 top-0 w-[400px] h-full opacity-[0.07] blur-sm"
                 style="background: #8b7355;"></div>
            <div class="absolute -right-40 top-0 w-[400px] h-full opacity-[0.07] blur-sm"
                 style="background: #8b7355;"></div>
        </div>

        {{-- Card — now has border + shadow + proper padding --}}
        <div class="relative z-10 bg-white"
             style="max-width: 420px; width: 100%;
                    padding: 48px 40px;
                    border: 1px solid #e8e6e1;
                    border-radius: 16px;
                    box-shadow: 0 8px 40px rgba(15,15,15,0.10);">

            {{-- Logo --}}
            <div class="text-center mb-8">
                <x-authentication-card-logo />
            </div>

            {{-- Heading --}}
            <h2 style="font-family: var(--ff-display); font-size: 32px; font-weight: 800;
                       color: var(--primary); text-align: center; letter-spacing: -0.03em;
                       margin: 0 0 10px;">
                Reset Password
            </h2>
            <p style="font-family: var(--ff-body); font-size: 14px; color: var(--text-secondary);
                      text-align: center; margin: 0 0 32px; font-weight: 400;">
                Enter your email to receive a reset link.
            </p>

            {{-- Success status --}}
            @if (session('status'))
                <div class="mb-6 text-sm text-center font-medium text-green-600"
                     style="font-family: var(--ff-body);">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Validation errors --}}
            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-2">
                    <label for="email" class="ls-label">Email Address</label>
                    <input
                        id="email"
                        class="ls-input"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="Enter your email"
                    >
                </div>

                {{-- Submit — margin-top via .ls-btn --}}
                <button type="submit" class="ls-btn">
                    Send Reset Link
                </button>

                {{-- Divider --}}
                <div style="height: 1px; background: #e8e6e1; margin: 28px 0;"></div>

                {{-- Back link --}}
                <div class="text-center">
                    <a class="ls-back" href="{{ route('login') }}">← Back to sign in</a>
                </div>

            </form>
        </div>
    </div>

</x-guest-layout>
