<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Profiles extends Component
{
    use WithPagination;
    use WithFileUploads;
    use LivewireAlert;

    protected $paginationTheme = 'bootstrap';
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => '10'],
    ];
    public $perPage = '10';
    public $search = '';
    public $action = 'STORE';
    public $temporaryUrl = false;

    public $time, $timeWhere = 'all';

    public $user, $user_id, $name, $lastname, $phone, $email, $urlImage, $password = '', $password_confirmation = '';

    public $position = 2, $profile_pos = 1;

    public  $PATH_ROOT = 'storage/images/users/';

    public function render()
    {
        $this->user = Auth::user();
        return view('livewire.admin.profiles');
    }

    public function updatePhoto($id)
    {
        $user = User::find($this->user->id);
        if ($this->urlImage != $user->urlImage) {
            $this->validate(['urlImage' => 'image'], ['urlImage.image' => 'La portada debe ser de formato: .jpg,.jpeg ó .png']);
            //save image
            $name = "file-" . time() . '.' . $this->urlImage->getClientOriginalExtension();
            $path = $this->PATH_ROOT . $this->urlImage->storeAs('/', $name, 'users');
        } else {
            $path = $user->urlImage;
        }

        $data = [
            'urlImage' => $path
        ];
        $user->update($data);

        $this->alert('success', 'Foto actualizada con exito.');
    }

    public function removePhoto($id)
    {

        $user = User::find($id);
        $path = 'images/user.jpg';
        $user->update([
            'urlImage' => $path
        ]);

        $this->alert('success', 'Foto eliminada con exito.', ['showCancelButton' => false,]);
    }

    public function loadData()
    {
        $this->profile_pos === 1 ? $this->profile_pos = 2 : $this->profile_pos = 1;
        $this->name = $this->user->name;
        $this->lastname = $this->user->lastname;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',
            'lastname' => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user->id)],
            'phone' => 'required|digits:10|numeric',
        ], [
            'name.required' => 'Campo obligatorio.',
            'lastname.required' => 'Campo obligatorio.',
            'name.regex' => 'Nombre incorrecto.',
            'lastname.regex' => 'Nombre incorrecto.',
            'email.required' => 'Campo obligatorio.',
            'email.email' => 'El correo no es valido.',
            'email.unique' => 'El correo ya esta en uso, intente con otro.',
            'phone.required' => 'Campo obligatorio.',
            'phone.digits' => 'Teléfono incorrecto.',
            'phone.numeric' => 'Teléfono incorrecto.',
        ]);
        $data = [
            'name' => $this->name,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'phone' => $this->phone,
        ];

        $this->user->update($data);

        if ($this->password != '' || $this->password_confirmation != '') {
            $this->validate([
                'password' => 'required|confirmed|min:8',
                'password_confirmation' => 'required'
            ], [
                'password.required' => 'Campo obligatorio.',
                'password.min' => 'Contraseña demasiado corta.',
                'password_confirmation.required' => 'Campo obligatorio.',
                'password.confirmed' => 'No se ha confirmado la contraseña.'
            ]);
            $this->user->update(['password' => Hash::make($this->password)]);
        }

        $this->alert('success', 'Usuario actualizado con exito.');
        $this->resetInputPassword();
    }

    public function setPosition($position)
    {
        $this->position = $position;
    }

    public function resetInputPassword()
    {
        $this->password = '';
        $this->password_confirmation = '';
    }
}
