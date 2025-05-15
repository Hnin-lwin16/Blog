<x-layout>
  <div class="container">
    <div class="row">
      <div class=" col-md-5 mx-auto">
        <div class="card p-4 my-3 shadow-sm">
          <h1 class=" text-primary text-center">Login Form</h1>
          <form method="post">
            @csrf
             
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              @error('email')
               <p class=" text-danger ">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" value="{{ old('passowrd') }}"class="form-control" id="exampleInputPassword1">
               @error('password')
               <p class=" text-danger ">{{ $message}}</p>
                @enderror
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
           
          </form>
        </div>
      </div>
    </div>
  </div>
</x-layout>