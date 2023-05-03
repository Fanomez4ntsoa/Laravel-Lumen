<?php
namespace App\Contracts\Admin;

use App\Meetad\Models\Group;
use App\Meetad\Models\User;

interface UserServiceInterface
{
    /**
     * Find User by Id
     *
     * @param integer $id
     * @return User|null
     */
    public function find(int $id): ?User;

    /**
     * Find User by Login
     *
     * @param string $login
     * @return User|null
     */
    public function findByLogin(string $login): ?User;

    //  /**
    //  * Find user inside a group
    //  *
    //  * @param integer $groupId
    //  * @param integer $userId
    //  * @return GroupUser|null
    //  */
    // public function findByIdWithGroup( int $groupId, int $userId): ?GroupUser;
    // public function findAdminAccessRight();

    // /**
    //  * Make user as admin
    //  * 
    //  * @param Group $group
    //  * @param User $user
    //  * 
    //  */
    // public function updateAccessToAdmin(Group $group, User $user,bool $action);
}