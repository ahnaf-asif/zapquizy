<?php 

    use Illuminate\Support\Facades\Auth;

    function me(){
        return Auth::user();
    }
    function is_admin(){
        return Auth::user()->role == 'admin';
    }