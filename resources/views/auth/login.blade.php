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
              <x-error name="email"/>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" value="{{ old('passowrd') }}"class="form-control" required="exampleInputPassword1">
               <x-error name="password"/>
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
           
          </form>
        </div>
      </div>
    </div>
  </div>
</x-layout>