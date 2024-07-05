
<x-app-layout>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-3">

                    @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="card-header mt-3">
                        <h1>Users</h1>
                        @can('create user')
                        <a href="{{ url('users/create') }}" class="btn btn-primary">Add Users</a>
                        @endcan

                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                  
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $rolename)
                                            <label class="badge badge-primary mx-1">{{ $rolename }}</label>
                                                
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>

                                        @can('update user')
                                        <a class="btn btn-primary mx-2" href="{{ url('users/'.$user->id.'/edit') }}">Edit</a>
                                        @endcan


                                        @can('delete user')
                                        <a class="btn btn-danger mx-2" href="{{ url('users/'.$user->id.'/delete') }}">Delete</a>
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
