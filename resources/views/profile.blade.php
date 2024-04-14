<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h1 class="text-lg font-medium text-gray-900 dark:text-gray-100 pb-5">
                                {{ __('User Profile') }}
                            </h1>


                        </header>
                        @if($user)
                        <ul class="list-group">
                            <li class="list-group-item">{{ $user->name }}</li>
                            <li class="list-group-item">{{ $user->email }}</li>
                            @if($orders && count($orders) > 0)
                            <ul class="list-group">
                                <li class="list-group-item"><b>Address :</b> {{ $orders[0]->address }}</li>
                                <li class="list-group-item"><b>Country :</b> {{ $orders[0]->country }}</li>
                                <li class="list-group-item"><b>City :</b> {{ $orders[0]->city }}</li>
                                <li class="list-group-item"><b>Code :</b> {{ $orders[0]->code }}</li>
                            </ul>
                            @endif


                        </ul>
                        @endif

                    </section>

                </div>
            </div>


        </div>
    </div>
</x-app-layout>