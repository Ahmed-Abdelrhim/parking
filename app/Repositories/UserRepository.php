<?php
namespace App\Repositories;
use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class UserRepository implements UserInterface
{
    public function  index(): Collection|array
    {
        return $users = User::query()->get();
    }
    public function getUsers()
    {
        $users =  $this->index();
        return $this->dataTable($users);
    }

    public function dataTable($users)
    {
        return Datatables::of($users)
            ->addColumn('action', function ($users) {
                $retAction =  '<a href="#" class="btn btn-sm btn-icon mr-2 accept float-left btn-success actions"><i class="far fa-check-circle"></i></a>';
                $retAction .= '<form class="float-left pl-2" action="#" method="POST">' . method_field('DELETE') . csrf_field() . '<button class="btn btn-sm btn-icon btn-danger actions">
                              <i class="fa fa-trash"></i></button></form>';
                return $retAction;
            })
            ->addColumn('id', function ($users) {
                return $users->id;
            })
            ->addColumn('name', function ($users) {
                    return $users->name;
            })
            ->addColumn('email', function ($users) {
                    return $users->email;
            })
            ->rawColumns(['name', 'action'])
            ->escapeColumns([])
            ->make(true);
    }
}
