<x-guest-layout>
    <style>
        :root {
            --primary: #0f0f0f;
            --secondary: #d4af37;
            --border-med: #d9d6d0;
            --text-primary: #1a1a1a;
            --text-secondary: #4a4a4a;
            --ff-display: 'Playfair Display', serif;
            --ff-body: 'Inter', sans-serif;
        }
    </style>

    <div class="min-h-screen flex items-center justify-center px-4" style="background: linear-gradient(135deg, #fafaf8 0%, rgba(212, 175, 55, 0.015) 100%); padding: 40px 20px;">
        <div class="bg-white rounded-xl p-10 sm:p-12 border border-[#e8e6e1] shadow-xl" style="max-width: 400px; width: 100%; backdrop-filter: blur(10px);">
            <div class="text-center mb-10">
                <x-authentication-card-logo />
            </div>

            <h2 class="text-center mb-2" style="font-family: var(--ff-display); font-size: 38px; font-weight: 800; color: var(--primary); letter-spacing: -0.03em;">Confirm Password</h2>
            <p class="text-center mb-10" style="font-family: var(--ff-body); font-size: 15px; color: var(--text-secondary); font-weight: 400;">This is a secure area. Please confirm your password.</p>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="mb-6">
                    <label for="password" class="block mb-2 text-xs font-semibold uppercase tracking-wider" style="font-family: var(--ff-body); color: var(--text-primary); letter-spacing: 0.1em;">Password</label>
                    <input id="password" class="w-full px-5 py-4 border border-[var(--border-med)] rounded-lg focus:outline-none focus:border-[var(--secondary)] transition-all duration-300 bg-white" type="password" name="password" required autocomplete="current-password" autofocus placeholder="Enter your password" style="font-family: var(--ff-body); font-size: 15px; color: var(--text-primary);">
                </div>

                <button type="submit" class="w-full py-4 px-6 font-bold text-xs uppercase tracking-widest rounded-lg transition-all duration-300 bg-[var(--primary)] text-white hover:bg-[var(--secondary)] hover:text-[var(--primary)] hover:transform hover:translate-y-[-2px] hover:shadow-lg" style="font-family: var(--ff-body); letter-spacing: 0.14em; border: 2px solid var(--primary);">
                    Confirm
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>