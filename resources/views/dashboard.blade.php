<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Available Plans') }}
        </h2>
    </x-slot>

    <div class="container py-12">
        <div class="row">
            
            @foreach ($plans as $plan)
            <div class="col-sm-4 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h3 class="font-semibold text-xl dark:text-gray-200 leading-tight p-2">{{ $plan->name }}</h3>
                        <h5 class="p-2"><b>Price : </b>$ {{ $plan->price }}</h5>
                        <p class="card-text p-2">{{ $plan->description }}</p>
                        <a href="checkout/{{$plan->id}}" class="btn btn-primary">Subscribe</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
