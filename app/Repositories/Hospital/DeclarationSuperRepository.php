<?php

namespace App\Repositories\Hospital;

use App\Models\Declaration;

class DeclarationSuperRepository
{

    public function model() {
        return Declaration::class;
    }

    public function birthGet(){
        return $this->model()::where('type_declaration_id', '1')->get();
    }

    public function deathGet(){
        return $this->model()::where('type_declaration_id', '2')->get();
    }

}
