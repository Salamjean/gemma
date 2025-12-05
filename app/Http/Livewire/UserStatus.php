<?php

namespace App\Http\Livewire;

use App\Models\Admin;
use Livewire\Component;

class UserStatus extends Component
{
    public int $status;
    public int $userId;

    public function mount( int $status, int $userId): void
    {
        $this->status = $status;
        $this->userId = $userId;
    }
    public function render()
    {
        return view('livewire.user-status');
    }
    public function changeStatus()
    {
        $this->status = $this->status == 1 ? 0 : 1;

        $user =Admin::find($this->userId);

        $user->status = strval($this->status);
        $user->save();

        $message_type = '';
        $message = '';

        if($user->status == 1)
        {
            $message_type = 'success';
            $message = 'Le compte de cette administrateur à été activé.';
        }else
        {
            $message_type = 'warning';
            $message = 'Le compte de cette administrateur à été désactivé.';
        }


        return to_route('admin.index')->with($message_type,$message);
    }
}
