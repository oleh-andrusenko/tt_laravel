<div
        class="fixed top-0 bottom-0 right-0 left-0 w-screen h-screen z-10 bg-black/25 flex items-center justify-center">

    <div class="w-[500px] bg-white px-4 py-2 rounded-lg">
        <h3 class="text-center text-xl font-semibold">Edit user with ID: {{$id}}</h3>
        <form wire:submit.prevent="updateUser">
            <div class="flex flex-col gap-2">
                <label class="uppercase font-semibold my-2" for="email">Email</label>
                <input
                        wire:model.live="email"
                        class="px-2 py-1 border rounded"
                        type="email"
                        value="{{$email}}"
                />

            </div>
            <div class="flex flex-col gap-2">
                <label class="uppercase font-semibold my-2" for="fullName">Full name</label>
                <input wire:model.live="fullName"
                       class="px-2 py-1 border rounded" type="text"
                       value="{{$fullName}}">
            </div>
            <div class="flex flex-col gap-2">
                <label class="uppercase font-semibold my-2" for="birthDate">Birth date</label>
                <input
                        wire:model.live="birthDate"
                        class="px-2 py-1 border rounded" type="date"
                        value="{{$birthDate}}">
            </div>
            <div class="flex flex-col gap-2">
                <label class="uppercase font-semibold my-2" for="avatar">Avatar</label>
                <input
                        wire:model.live="avatar"
                        class="px-2 py-1 border rounded"
                        type="file"
                        >
            </div>
            <div class="flex flex-col gap-2">
                <label class="uppercase font-semibold my-2" for="role">Role</label>
                <select class="px-2 py-1 rounded" name="role" id="role" wire:model.live="isAdmin">
                    <option value="0" selected="{{$isAdmin === 0}}">User</option>
                    <option value="1" selected="{{$isAdmin === 1}}">Admin</option>
                </select>
            </div>

            <div class="flex gap-4 justify-end  mt-6">
                <button type="submit" class="px-2 py-1 rounded bg-green-600 text-white">Save</button>
                <button type="button" class="px-2 py-1 rounded bg-red-600 text-white" wire:click="close">Close</button>
            </div>
        </form>
    </div>
</div>
