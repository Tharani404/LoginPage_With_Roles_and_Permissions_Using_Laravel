<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card  mt-3">
                    <div class="card-header">
                        <h2>Edit Permission</h2>
                        <a href="{{ url('permissions') }}" class="btn btn-danger">Back</a>
                    </div>
    
                    
    
                    <div class="card-body">
                            <form action="{{ url('permissions/'.$permission->id) }}" method="POST">
                                @csrf
                                @method('PUT')
    
                                <div class="mb-3">
                                        <label for="">Name</label>
                                        <input type="text" name="name" value="{{ $permission->name }}" class="form-control">
                                    
                                </div>
                    
                            <button type="submit" class="btn btn-success">Update</button>
    
    
                            </form>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
    </x-app-layout>