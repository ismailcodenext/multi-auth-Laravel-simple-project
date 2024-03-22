<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container d-flex justify-content-center mt-4" style="height: 100vh;">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">User List</h2>
                        @if($users->isEmpty())
                            <p class="text-center">No Pending Requests</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered" id="users-table">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $key => $user)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <a href="{{ route('dashboard') }}" onclick="approveUser({{ $user->id }});" style="background-color: green; color: white; padding: 5px" title="Accept Request">Accept</a>
                                                <a href="{{ route('delete_user', $user->id) }}" style="background-color: red; color: white; padding: 5px" title="Decline Request">Decline</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function approveUser(userId) {
        axios.put('/approve_User/' + userId)
            .then(response => {
                // Handle success, e.g., refresh the page or update UI
                location.reload(); // Reload the page after approval
            })
            .catch(error => {
                // Handle error
                console.error(error);
            });
    }
</script>

