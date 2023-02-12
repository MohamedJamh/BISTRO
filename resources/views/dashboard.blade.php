<x-layout title="Dashboard">
<div class="relative overflow-x-auto mx-10 mt-10 rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Username
                </th>
                <th scope="col" class="px-6 py-3">
                    Adress
                </th>
                <th scope="col" class="px-6 py-3">
                    Verified
                </th>
                <th scope="col" class="px-6 py-3">
                    Verified at
                </th>
                <th scope="col" class="px-6 py-3">
                    Is Admin
                </th>
                <th scope="col" class="px-6 py-3">
                    Switch Roles
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$user->name}}
                    </th>
                    <td class="px-6 py-4">
                        {{$user->email}}
                    </td>
                    @if ($user->email != null)
                        <td class="px-6 py-4">
                            Yes
                        </td>
                        <td class="px-6 py-4">
                            {{$user->email_verified_at}}
                        </td>
                    @else
                        <td class="px-6 py-4">
                            No
                        </td>
                        <td class="px-6 py-4">
                            --
                        </td>
                    @endif
                    @if($user->roles()->where('name','Admin')->exists())
                    <td class="px-6 py-4">
                        Yes
                    </td>
                    <td class="px-6 py-4">
                        <form action="{{ route('dashboard.switch-user-role',['user'=>$user->id,'action'=>'Detach']) }}" method="POST">
                            @csrf
                            <button type="submit">Revoke Admin Role</button>
                        </form>
                    </td>
                    @else
                    <td class="px-6 py-4">
                        No
                    </td>
                    <td class="px-6 py-4">
                        {{-- method | admin  --}}
                        <form action="{{ route('dashboard.switch-user-role',['user'=>$user->id,'action'=>'Attach']) }}" method="POST">
                            @csrf
                            <button type="submit">Grant Admin Role</button>
                        </form>
                    </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</x-layout>
