<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif


                <div class="card  mt-3">
                    <div class="card-header">
                        <h2>Role : {{ $role->name }}</h2>
                        <a href="{{ url('roles') }}" class="btn btn-danger">Back</a>
                    </div>
    
    
                    <div class="card-body">

                            <form action="{{ url('roles/'.$role->id.'/give-permissions') }}" method="POST">
                                @csrf
                                @method('PUT')
    
                                <div class="mb-3">
                                    @error('permission')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                        <label for="">Permissions</label>

                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                            
                                            <div class="col-md-2">
                                                <label>
                                                    <input 
                                                        type="checkbox" 
                                                        name="permission[]" 
                                                        value="{{ $permission->name }}" 
                                                        {{ in_array($permission->id, $rolePermissions) ? 'checked':'' }}
                                                    />
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success mt-3">Update</button>
                                </div>
                    
    
                            </form>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>