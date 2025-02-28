<div class="w-3/4 mx-auto ">
    @livewireScripts
    <div class="flex justify-between items-center py-5">
       <div class="my-3 w-1/5">
           <h2 class=" text-xl font-semibold">Users list</h2>

       </div>
        <div class="w-3/5">
            <input class="w-full px-3 py-1 border-2 rounded-lg"
                   type="text"
                   wire:model.live="search"
                   placeholder="Search..."/>
        </div>
        <a href="{{route('register')}}" class="px-2 py-1 rounded bg-green-700 text-white flex items-center justify-center">+ Create new user</a>
    </div>
    <table class="w-full text-slate-700 text-sm">
        <thead>
        <tr class="*:py-4 *:text-center font-semibold bg-blue-200">
            <td>ID</td>
            <td>Avatar</td>
            <td>Email</td>
            <td>Full name</td>
            <td>Birth date</td>
            <td>Role</td>
            <td colspan="2">Actions</td>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr class="*:text-center *:py-4 *:border-b-2">
                <td>{{$user->id}}</td>
                <td class="flex items-center justify-center">
                    <div class="w-10 h-10 bg-[url({{asset('assets/userAvatars/'.$user['avatar'])}})] bg-cover bg-center rounded-full"></div>
                </td>
                <td>{{$user->email}}</td>
                <td>{{$user->fullName}}</td>
                <td>{{$user->birthDate}}</td>
                <td>{{$user->isAdmin ? 'Admin' : 'User'}}</td>
                <td class="border-l">
                    <button
                        class="p-2 rounded bg-orange-500 text-white border border-orange-600"
                        wire:click="editUser({{$user->id}})">
                        <i class="fa-solid fa-user-pen text-orange-50"></i>
                    </button>
                </td>
                <td>
                    <button class="p-2 bg-red-500 text-white border border-red-600 rounded "
                            wire:click.prevent="deleteUser({{$user->id}})"
                            wire:confirm="Are you sure you want to delete this user?"
                    >
                        <i class="fa-solid fa-trash-can"></i>
                    </button>

                </td>
            </tr>
        @empty
            <tr>
               <td colspan="7" class="text-lg text-center py-6">No records...</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <div class="my-5">
        {{$users->links()}}
    </div>


    @if($showEditForm)
        <livewire:edit-user-form
            :id="$this->userToEdit->id"
            :email="$this->userToEdit->email"
            :fullName="$this->userToEdit->fullName"
            :birthDate="$this->userToEdit->birthDate"
            :isAdmin="$this->userToEdit->isAdmin"
        />

    @endif
</div>
