<?php

namespace App\Http\Livewire;

use App\Models\Doctor;
use Livewire\Component;

class DoctorStatus extends Component
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
        return view('livewire.doctor-status');
    }

    public function changeStatus()
    {
        $this->status = $this->status == 1 ? 0 : 1;

        $user = Doctor::find($this->userId);

        $user->status = strval($this->status);
        $user->save();

        $message_type = '';
        $message = '';

        if($user->status == 1)
        {
            $message_type = 'success';
            $message = 'Le compte de ce docteur à été activé.';
        }else
        {
            $message_type = 'warning';
            $message = 'Le compte de ce docteur à été désactivé.';
        }


        return to_route('doctor.index')->with($message_type,$message);
    }
}
