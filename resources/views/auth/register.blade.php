<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=Inter:wght@300;400;600&display=swap');

        :root {
            --primary: #0f0f0f;
            --secondary: #d4af37;
            --text-primary: #1a1a1a;
            --text-secondary: #4a4a4a;
            --ff-display: 'Playfair Display', Georgia, serif;
            --ff-body: 'Inter', system-ui, sans-serif;
        }

        .ls-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px 20px;
            background: linear-gradient(135deg, #faf8f5 0%, #f5f3f0 100%);
            position: relative;
            overflow: hidden;
        }
        .ls-page::before {
            content: '';
            position: absolute;
            left: 0; top: 0;
            width: 220px; height: 100%;
            background: linear-gradient(180deg, #c8a96e 0%, #a07850 40%, #7a5c38 100%);
            opacity: 0.18;
            filter: blur(2px);
            pointer-events: none;
        }

        .ls-page::after {
            content: '';
            position: absolute;
            right: 0; top: 0;
            width: 220px; height: 100%;
            background: linear-gradient(180deg, #c8a96e 0%, #a07850 40%, #7a5c38 100%);
            opacity: 0.18;
            filter: blur(2px);
            pointer-events: none;
        }
        .ls-card {
            position: relative;
            z-index: 10;
            background: #fff;
            max-width: 420px;
            width: 100%;
            padding: 48px 40px;
            border: 1px solid #e8e6e1;
            border-radius: 16px;
            box-shadow: 0 8px 40px rgba(15,15,15,0.10);
        }

        .ls-input {
            width: 100%;
            height: 52px;
            background: #F9FAFB;
            border: 1px solid #E5E7EB;
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
            transition: background-color 5000s ease-in-out 0s;
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

        .ls-btn {
            width: 100%;
            height: 52px;
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

        .ls-btn:active { transform: translateY(0); box-shadow: none; }

        .ls-link {
            font-family: var(--ff-body);
            font-size: 14px;
            font-weight: 600;
            color: var(--secondary);
            text-decoration: none;
            transition: opacity 0.2s;
        }
        .ls-link:hover { opacity: 0.7; text-decoration: underline; }
    </style>

    <div class="ls-page">
        <div class="ls-card">

            <div style="text-align: center; margin-bottom: 32px;">
                <x-authentication-card-logo />
            </div>

            <h2 style="font-family: var(--ff-display); font-size: 32px; font-weight: 800;
                       color: var(--primary); text-align: center; letter-spacing: -0.03em;
                       margin: 0 0 10px;">
                Create Account
            </h2>
            <p style="font-family: var(--ff-body); font-size: 14px; color: var(--text-secondary);
                      text-align: center; margin: 0 0 32px;">
                Join us for exclusive offers and collections.
            </p>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}">
                @csrf


                <div style="margin-bottom: 20px;">
                    <label for="name" class="ls-label">Full Name</label>
                    <input id="name" class="ls-input" type="text" name="name"
                           :value="old('name')" required autofocus autocomplete="name"
                           placeholder="Enter your full name">
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="email" class="ls-label">Email Address</label>
                    <input id="email" class="ls-input" type="email" name="email"
                           :value="old('email')" required autocomplete="username"
                           placeholder="Enter your email">
                </div>

                <div style="margin-bottom: 20px;">
                    <label for="password" class="ls-label">Password</label>
                    <input id="password" class="ls-input" type="password" name="password"
                           required autocomplete="new-password"
                           placeholder="Create a password">
                </div>

                <div style="margin-bottom: 24px;">
                    <label for="password_confirmation" class="ls-label">Confirm Password</label>
                    <input id="password_confirmation" class="ls-input" type="password"
                           name="password_confirmation" required autocomplete="new-password"
                           placeholder="Confirm your password">
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div style="margin-bottom: 24px;">
                        <label for="terms" style="display: flex; align-items: flex-start; gap: 10px; cursor: pointer;">
                            <input id="terms" name="terms" type="checkbox" required
                                   style="width:16px; height:16px; margin-top:2px; flex-shrink:0; accent-color: var(--primary); cursor:pointer;">
                            <span style="font-family: var(--ff-body); font-size: 13px; color: var(--text-secondary); line-height: 1.6;">
                                I agree to the
                                <a href="{{ route('terms.show') }}" class="ls-link" style="font-size:13px;">Terms of Service</a>
                                and
                                <a href="{{ route('policy.show') }}" class="ls-link" style="font-size:13px;">Privacy Policy</a>
                            </span>
                        </label>
                    </div>
                @endif

                <button type="submit" class="ls-btn">Create Account</button>

                <div style="height: 1px; background: #e8e6e1; margin: 28px 0;"></div>

                <div style="text-align: center;">
                    <span style="font-family: var(--ff-body); font-size: 14px; color: var(--text-secondary);">
                        Already have an account?
                    </span>
                    <a class="ls-link" href="{{ route('login') }}" style="margin-left: 4px;">Sign in</a>
                </div>

            </form>
        </div>
    </div>

</x-guest-layout>
