<x-app-layout>
   

    <div class="container py-12">
    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Checkout</h1>
        <div class="row mt-5">
          
            <div class="col-6">
                <div class="card">
                    
                    <div class="card-body">
                        <h5 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight p-1">{{$plans->name}}</h5>
                        <p class="card-text"><b>Price : </b>${{$plans->price}}</p>
                        <p class="card-text"><b>Description : </b>${{$plans->description}}</p>
                        
                    </div>
                </div>
            </div>
            <div class="col-6">

                <form action="{{ route('checkout.submit') }}" method="post">
                @csrf
                    <div class="mb-2">
                        <label for="name" class="form-label">Name</label>
                        <input type="name" class="form-control" placeholder="Name" value="{{ $user->name }}">
                        
                    </div>
                    <div class="mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control"  value="{{ $user->email }}" >
                    </div>
                    <div class="mb-2" style="display: none;">
                        <label for="userId" class="form-label">userId</label>
                        <input type="text" class="form-control" name="user_id"  value="{{ $user->id }}" >
                    </div>
                    <div class="mb-2" style="display: none;">
                        <label for="userId" class="form-label">PlanId</label>
                        <input type="text" class="form-control" name="plan_id"  value="{{ $plans->id }}" >
                    </div>
                   
                    <div class="mb-2">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address"  class="form-control" >
                    </div>
                    <div class="mb-2">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" class="form-control" >
                    </div>
                    <div class="mb-2">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" name="country" class="form-control" >
                    </div>
                    <div class="mb-2">
                        <label for="code" class="form-label">Code</label>
                        <input type="number" name="code" class="form-control" >
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>