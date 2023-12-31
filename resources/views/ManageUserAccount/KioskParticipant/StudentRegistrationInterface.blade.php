<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
    
        <div class = "container" align="center" >
            <img src="/assets/logo.png" alt="" width="50%">
        </div>
        <!-- <div class = "container" align="center" >
            <i Student Registration ></i>
        </div> -->
        
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="matrix_id" value="{{ __('MatrixID') }}" />
                <x-input id="matrix_id" class="block mt-1 w-full" type="text" name="matrix_id" :value="old('matrix_id')" />
            </div>

            <div class="mt-4">
                <x-label for="phone_num" value="{{ __('Phone Number') }}" />
                <x-input id="phone_num" class="block mt-1 w-full" type="text" name="phone_num" :value="old('phone_num')" />
            </div>

            <div class="mt-4">
                <x-label for="ic_number" value="{{ __('IC Number') }}" />
                <x-input id="ic_number" class="block mt-1 w-full" type="text" name="ic_number" :value="old('ic_number')" />
            </div>

            <!-- <div class="mt-4">
                <x-label for="ic_number" value="{{ __('Account Type') }}" />
                <x-input id="account_type" class="block mt-1 w-full" type="text" name="account_type" :value="old('account_type')" />
            </div> -->

            <input type="hidden" name="account_type" value="student">

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
