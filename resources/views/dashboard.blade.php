<x-app-layout>
    @section('title', 'Market Store - Mi perfil')
    @include('layouts.partials.navbar')

    <?php
    $mi_token = session()->has('mi_token') ? session('mi_token') : '';
    ?>

    <div class="w-full">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  mt-[50px]">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Panel de administración
                        @auth
                            <form id="customers-form" action="/api/v1/customers" method="get">
                                @csrf
                                <input type="hidden" name="token" value="{{ $mi_token }}">
                                <!-- Pasa el token como un valor oculto -->
                                <button type="submit">Clientes</button>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('customers-form').addEventListener('submit', function(event) {
            event.preventDefault();
            let token = this.querySelector('input[name="token"]').value;
            console.log('token', token);
            let headers = new Headers();
            headers.append('Authorization', 'Bearer ' + token);
            headers.append('Accept', 'application/json');

            let request = new Request(this.action, {
                method: this.method,
                headers: headers,
                redirect: 'follow'
            });
            fetch(request)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
</x-app-layout>
