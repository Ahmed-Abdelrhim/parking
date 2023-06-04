@include('layouts.custom_style')
<div style="display: flex;max-height:100%;" id="parent">

    <div class="image">
        {{--        <img src="{{ asset('images/component_2.png') }}" alt="" style="height: 100%; width: 100%">--}}
        <img src="{{ asset('images/login_image.png') }}" alt="" style="height: 100%; width: 100%">
    </div>


    <div class="form">
        <x-guest-layout>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4 ahmed" :status="session('status')"/>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    Welcome to Q-Parking! 👋  🚀
                    <i> </i>
                    <br />
                    <small>
                        Please sign-in to your account and start the adventure
                    </small>
                </div>

                <!-- Email Address -->
                <div style="margin-top: 30px;">
                    <x-input-label for="email" :value="__('Email')"/>
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                                  required
                                  autofocus autocomplete="username" style="width: 100%"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')"/>

                    <x-text-input id="password" class="block mt-1 w-full"
                                  type="password"
                                  name="password"
                                  required autocomplete="current-password"/>

                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                </div>

                <!-- Remember Me -->
                <!--
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                -->

                <div class="" style="margin-top: 25px; margin-left: -12px;">
                    <div class="login-button">
                        <x-primary-button class="ml-3 w-full ">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </div>

                <div class="forget-password">
                    @if (Route::has('password.request'))
                        <a style="margin-top: 30px;!important;"
                           class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                           href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

            </form>

        </x-guest-layout>
    </div>


</div>
