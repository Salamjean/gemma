<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
//use App\Repositories\DeclarationSuperRepository;
use Illuminate\Http\Request;

class DeclarationController extends Controller
{
    protected  $title;
    protected  $repository;

    public function __construct($title = 'Déclaration -')
    {
        $this->title = $title;
        //$this->repository = new DeclarationSuperRepository();
    }
    public function birth()
    {
        $title = 'Les declarations de naissance';
        $data = $this->repository->birthGet();
        return view('users.super.declaration.birth', compact('title', 'data'));
    }

    public function death()
    {
        $title = 'Les declarations de décès';
        $data = $this->repository->deathGet();
        return view('users.super.declaration.death', compact('title', 'data'));
    }

    public function search($type)
    {
        $data = $type == 'all' ? 'Rechercher' : $type;
        $title = $this->title . ' ' .$data ;
        return view('users.super.declaration.search', compact('title'));
    }
}
