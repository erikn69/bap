<?php

namespace App\Http\Livewire\Admin\User\Permission;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Create extends Component
{
    use LivewireAlert;
    public $name;

    public function create()
    {
        $this->validate([
            'name' => 'required|string'
        ]);

        Permission::create(['guard_name' => 'web', 'name' => $this->name]);

        $this->emitTo(\App\Http\Livewire\Admin\User\Permission\Index::getName(), 'updateList');
        $this->emit('hideModal');

        $this->alert('success', __('bap.created'));
    }

    public function render()
    {
        return view('livewire.admin.user.permission.create');
    }
}
