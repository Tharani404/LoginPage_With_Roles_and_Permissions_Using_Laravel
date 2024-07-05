
<x-app-layout>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">

                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="card-header mt-3">
                        <h1>Roles</h1>
                        <a href="{{ url('roles/create') }}" class="btn btn-primary">Add Roles</a>
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
                                @foreach ($roles as $role)
                                  
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td width="280px">{{ $role->name }}</td>
                                    <td>
                                        <a class="btn btn-warning mx-2" href="{{ url('roles/'.$role->id.'/give-permissions') }}">Add-Role-Permissions</a>

                                        @can('update role')
                                        <a class="btn btn-primary mx-2" href="{{ url('roles/'.$role->id.'/edit') }}">Edit</a>
                                        @endcan

                                        @can('delete role')
                                        <a class="btn btn-danger mx-2" href="{{ url('roles/'.$role->id.'/delete') }}">Delete</a>
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
