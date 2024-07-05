
<x-app-layout>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">

                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="card-header mt-3">
                        <h1>Permission</h1>
                        <a href="{{ url('permissions/create') }}" class="btn btn-primary">Add Permissions</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                  
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td width="280px">{{ $permission->name }}</td>
                                    <td>

                                        @can('update permission')
                                        <a class="btn btn-primary mx-2" href="{{ url('permissions/'.$permission->id.'/edit') }}">Edit</a>
                                        @endcan

                                        @can('delete permission')
                                        <a class="btn btn-danger mx-2" href="{{ url('permissions/'.$permission->id.'/delete') }}">Delete</a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
