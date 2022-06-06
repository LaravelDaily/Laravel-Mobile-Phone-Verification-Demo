<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, you need to verify your mobile phone number.') }}
        </div>

        <div class="text-sm text-gray-600">
            {{ __('Please enter the OTP sent to your number:') }} {{ auth()->user()->mobile_number }}
        </div>

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.verify-mobile') }}">
                @csrf

                <div>
                    <x-label for="code" :value="__('Code')" />

                    <x-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code')" required autofocus />
                </div>

                <div class="mt-4">
                    <x-button>
                        {{ __('Verify') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
