<?php

namespace App\Policies;

use App\Models\Address;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AddressPolicy
{
    use HandlesAuthorization;


   // пример создания своей функции
     public function my(User $user, int $n){
       return $user->id === $n;
    }  


    /**
     * Определите, может ли пользователь просматривать какие-либо модели.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    // можно записать (?User $user) то доступ будет для всех
    public function viewAny(User $user)
    {
       return true;// Определили просмотр
    }

    /**
     * Определите, может ли пользователь просматривать модель.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Address $address)
    {
        // если $user->id равен 11 то может просматривать модель
        return $user->id === 11 && $address->id === 3;
       //  return true;
    }

    /**
     * Определите, может ли пользователь создавать модели.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
       // если  $user->id равен 11 или 2 или 5 то может создавать
        return in_array ($user->id, [11,2,5]);
    }

    /**
     * Определите, может ли пользователь обновить модель.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Address $address)
    {
        // Обновлять может только свои адреса
        return $user->id === $address->user_id;
    }

    /**
     * Определите, может ли пользователь удалить модель.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Address $address)
    {
        // удалять не может
        return false;
    }

    /**
     * Определите, может ли пользователь восстановить модель.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Address $address)
    {
        return false;
    }

    /**
     * Определите, может ли пользователь безвозвратно удалить модель.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Address $address)
    {
        return false;
    }
}
