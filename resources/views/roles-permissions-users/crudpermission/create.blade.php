<x-app-layout>

    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-3">
                        <div class="card-header ">
                            <h2>Create Permission</h2>
                            <a href="{{ url('permissions') }}" class="btn btn-danger">Back</a>
                        </div>
    
                        
    
                        <div class="card-body ">
                                <form action="{{ url('permissions') }}" method="POST">
                                    @csrf
    
                                    <div class="mb-3">
                                        {{--  <form action="{{ url('permissions') }}" method="POST">  --}}
                                            <label for="">Name</label>
                                            <input type="text" name="name" class="form-control">
                                        {{--  </form>  --}}
                                    </div>
    
                                    {{--  <div class="mb-3">
                                        <form action="{{ url('permissions') }}" method="POST">
                                            <label for="">Email</label>
                                            <input type="text" name="email" class="form-control">
                                       </form>
                                    </div>
                
                                    <div class="mb-3">
                                        <form action="{{ url('permissions') }}" method="POST">
                                            <label for="">Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </form>
                                    </div>  --}}
                        
                                    <button type="submit" class="btn btn-primary">Save</button>
                
    
                                </form>
                        </div>
    
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>