<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Date;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditUserForm extends Component
{
    use WithFileUploads;

    public int $id;
    public string $email;
    public string $fullName;
    public $birthDate;
    public int $isAdmin;
    public $avatar;

    private $fileName;


    public function render()
    {
        return view('livewire.edit-user-form');
    }

    public function close()
    {
        $this->dispatch('close-form');
    }

    public function updateUser()
    {
        if ($this->avatar) {
            $this->fileName = uniqid() . '-' . $this->avatar->getClientOriginalName();
            $this->avatar->storeAs('assets/userAvatars',  $this->fileName, 'public');
        }
        User::where('id', $this->id)
            ->first()
            ->update(
                [
                    'email' => $this->email,
                    'fullName' => $this->fullName,
                    'birthDate' => $this->birthDate,
                    'isAdmin' => $this->isAdmin,
                    'avatar' => $this->fileName,
                ]
            );
        $this->dispatch('close-form');
    }


}
