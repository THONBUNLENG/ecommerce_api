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
        <div class="bg-white rounded-xl p-10 sm:p-12 border border-[#e8e6e1] shadow-xl text-center" style="max-width: 400px; width: 100%; backdrop-filter: blur(10px);">
            <div class="text-center mb-10">
                <x-authentication-card-logo />
            </div>

            <h2 class="text-center mb-2" style="font-family: var(--ff-display); font-size: 38px; font-weight: 800; color: var(--primary); letter-spacing: -0.03em;">Verify Email</h2>
            <p class="text-center mb-10" style="font-family: var(--ff-body); font-size: 15px; color: var(--text-secondary); font-weight: 400;">Please verify your email address to continue</p>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __('A new verification link has been sent.') }}
                </div>
            @endif

            <div class="flex flex-col gap-4">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="w-full py-4 px-6 font-bold text-xs uppercase tracking-widest rounded-lg transition-all duration-300 bg-[var(--primary)] text-white hover:bg-[var(--secondary)] hover:text-[var(--primary)] border-2 border-[var(--primary)] hover:border-[var(--secondary)]" style="font-family: var(--ff-body); letter-spacing: 0.14em;">
                        Resend Email
                    </button>
                </form>

                <a class="text-sm font-semibold hover:opacity-70 transition" href="{{ route('profile.show') }}" style="font-family: var(--ff-body); color: var(--secondary);">Edit Profile</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm font-semibold hover:opacity-70 transition" style="font-family: var(--ff-body); color: var(--secondary);">Log Out</button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
