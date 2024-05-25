<x-app-layout>
    @section('title', 'Market Store - Mi perfil')
    @include('layouts.partials.navbar')
    <!--<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>-->

    <div class="p-4">
        <div class="w-full min-h-screen md:max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="w-full flex flex-col items-center mt-[80px] sm:mt-[80px] lg:mt-[150px]">
                <div class="w-full flex flex-col lg:flex-row justify-between sm:items-center gap-2">
                    <div class="w-full md:w-[80%] lg:w-[49%] p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                    <div class="w-full md:w-[80%] lg:w-[49%] p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>
                <div class="w-full p-4 sm:p-8 bg-white shadow sm:rounded-lg mt-10">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
