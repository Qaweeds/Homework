<?php


namespace App\Controllers;


class UserController extends Controller
{
    public function index()
    {
        dd(__METHOD__);
    }

    public function show($id)
    {
        dd(__METHOD__, $id);
    }

    public function edit($id)
    {
        dd(__METHOD__, $id);
    }
}