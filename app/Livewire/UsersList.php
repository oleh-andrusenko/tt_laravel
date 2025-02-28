<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination;

    public bool $showEditForm = false;

    public User $userToEdit;

    public string $search = '';

    public function render()
    {

        return view('livewire.users-list',
            ['users' => User::where('fullName', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->paginate(20)]);
    }

    public function search()
    {
        $this->resetPage();
    }

    public function placeholder()
    {
        return <<<'HTML'
        <div class="w-full h-[300px] flex items-center justify-center animate-pulse text-xl">
            Loading...
        </div>
        HTML;
    }

    public function editUser($userId)
    {
        $this->showEditForm = true;
        $this->userToEdit = User::where('id', $userId)->first();
    }

    #[On('close-form')]
    public function closeForm()
    {
        $this->showEditForm = false;
        $this->search = '';
        if ($this->userToEdit) {
            unset($this->userToEdit);
        }
    }

    public function deleteUser($userId)
    {
        User::where('id', $userId)->first()->delete();
    }


}
