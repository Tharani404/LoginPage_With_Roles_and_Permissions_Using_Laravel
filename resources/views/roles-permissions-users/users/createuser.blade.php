<x-app-layout>

    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-header ">
                            <h2>Create User</h2>
                            <a href="{{ url('users') }}" class="btn btn-danger float-end">Back</a>
                        </div>
    
                        
    
                        <div class="card-body ">
                                <form action="{{ url('users') }}" method="POST">
                                    @csrf
    
                                    <div class="mb-3">
                                        {{--  <form action="{{ url('users') }}" method="POST">  --}}
                                            <label for="">User Name</label>
                                            <input type="text" name="name" class="form-control">
                                        {{--  </form>  --}}
                                    </div>
    
                                    <div class="mb-3">
                                        {{--  <form action="{{ url('users') }}" method="POST">  --}}
                                            <label for="">Email</label>
                                            <input type="text" name="email" class="form-control">
                                       {{--  </form>  --}}
                                    </div>
                
                                    <div class="mb-3">
                                        {{--  <form action="{{ url('users') }}" method="POST">  --}}
                                            <label for="">Password</label>
                                            <input type="password" name="password" class="form-control">
                                        {{--  </form>  --}}
                                    </div>

                                    <div class="mb-3">
                                        {{--  <form action="{{ url('permissions') }}" method="POST">  --}}
                                            <label for="">Role</label>
                                            <select name="roles[]" class="form-control" multiple>
                                                <option value="">Select Role</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role }}">{{ $role }}</option>
                                                @endforeach
                                            </select>
                                       {{--  </form>  --}}
                                    </div>
                                    
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary" class="form-control">Save</button>

                                </div>
                                </form>
                        </div>
    
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>