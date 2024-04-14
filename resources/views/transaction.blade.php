<x-app-layout>


    <div class="container py-12">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Transactions</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Transaction Date</th>
                    <th scope="col">Payment Refrence</th>
                    <th scope="col">Plan Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Payment Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $index => $order)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ $order->created_at->format('d-M-Y H:i:s') }}</td>
                    <td>{{$order->payment_id}}</td>
                    <td>
                        @php
                        
                        $plan = \App\Models\Plan::find($order->plan_id);
                        @endphp
                        {{ $plan->name ?? 'Unknown' }}
                    </td>
                    <td>
                        @php
                        
                        $plan = \App\Models\Plan::find($order->plan_id);
                        @endphp
                        {{ $plan->price ?? 'Unknown' }}
                    </td>
                    <td>{{ $order->status !== 1 ? 'Success' : 'Failed' }}</td>

                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</x-app-layout>