<x-app-layout>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card  mt-3">
                <div class="card-header">
                    <h2>Edit Role</h2>
                    <a href="{{ url('roles') }}" class="btn btn-danger">Back</a>
                </div>

                

                <div class="card-body">
                        <form action="{{ url('roles/'.$role->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="name" value="{{ $role->name }}" class="form-control">
                                </form>
                            </div>
                            

                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Update</button>

                            </div>

                        </form>
                </div>

            </div>
        </div>
    </div>
</div>
</x-app-layout>