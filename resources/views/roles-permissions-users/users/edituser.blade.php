<x-app-layout>

    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-header ">
                            <h2>Edit User</h2>
                            <a href="{{ url('users') }}" class="btn btn-danger float-end">Back</a>
                        </div>
    
                        
    
                        <div class="card-body ">
                                <form action="{{ url('users/'.$user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
    
                                    <div class="mb-3">
                                        {{--  <form action="{{ url('users') }}" method="POST">  --}}
                                            <label for="">User Name</label>
                                            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                        {{--  </form>  --}}
                                    </div>
    
                                    <div class="mb-3">
                                        {{--  <form action="{{ url('users') }}" method="POST">  --}}
                                            <label for="">Email</label>
                                            <input type="text" name="email" readonly value="{{ $user->email }}" class="form-control">
                                       {{--  </form>  --}}
                                    </div>
                
                                    <div class="mb-3">
                                        {{--  <form action="{{ url('users') }}" method="POST">  --}}
                                            <label for="">Password</label>
                                            <input type="password" name="password"  class="form-control">
                                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror

                                        {{--  </form>  --}}
                                    </div>

                                    <div class="mb-3">
                                        {{--  <form action="{{ url('permissions') }}" method="POST">  --}}
                                            <label for="">Role</label>
                                            <select name="roles[]" class="form-control" value="{{ $user->roles }}" multiple>
                                                <option value="">Select Role</option>
                                                @foreach ($roles as $role)
                                                    <option 
                                                    value="{{ $role }}"
                                                    {{ in_array($role, $userRoles) ? 'selected':'' }}
                                                    >
                                                    {{ $role }}</option>
                                                @endforeach
                                            </select>
                                            @error('roles') <span class="text-danger">{{ $message }}</span> @enderror

                                       {{--  </form>  --}}
                                    </div>
                                    
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success" class="form-control">Update</button>

                                </div>
                                </form>
                        </div>
    
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>