<?php
namespace App\Interfaces;
interface RoleInterface {
    public function all();

    public function create();
    public function show($id);

    public function edit();

    public function destroy($id);
}
