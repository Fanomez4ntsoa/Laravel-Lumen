<?php
namespace App\Contracts\Admin;

use App\Meetad\Models\Group;
use App\Meetad\Models\User;
use DateTime;

interface GroupServiceInterface
{
    /**
     * Get group
     *
     * @param integer $id
     * @return Group|null
     */
    public function find(int $id): ?Group;

    // /**
    //  * List all groups by user
    //  *
    //  * @param User $user
    //  * @return array
    //  */
    // public function findByUser(User $user): array;

    // /**
    //  * Check if group has user
    //  *
    //  * @param integer $groupId
    //  * @param integer $userId
    //  * @return boolean
    //  */
    // public function hasUser(int $groupId, int $userId): bool;

    // /**
    //  * Attach an user into group
    //  *
    //  * @param Group $group
    //  * @param User $user
    //  * @param DateTime|null $validFrom
    //  * @param DateTime|null $validTill
    //  * @param User $by
    //  * @return boolean
    //  */
    // public function attachUser(Group $group, User $user, DateTime $validFrom = null, DateTime $validTill = null, User $by): bool;

    // /**
    //  * Add new user into group
    //  *
    //  * @param Group $group
    //  * @param string $name
    //  * @param string|null $firstname
    //  * @param string $email
    //  * @param string $smsAddress
    //  * @param DateTime|null $validFrom
    //  * @param DateTime|null $validTill
    //  * @param User $by
    //  * @return boolean
    //  */
    // public function addUser(Group $group, string $name, string $firstname = null, string $email, DateTime $validFrom = null, DateTime $validTill = null, User $by): bool;
    
    // /**
    //  * Detach user from database
    //  *
    //  * @param Group $group
    //  * @param integer $userId
    //  * @param User $admin
    //  * @return boolean|null
    //  */
    // public function detachUser(Group $group, int $userId, User $admin): ?bool;


    // /**
    //  * Update user in a group
    //  *
    //  * @param Group $group
    //  * @param User $user
    //  * @param string $name
    //  * @param string|null $firstname
    //  * @param string $email
    //  * @param string $smsAddress
    //  * @param DateTime|null $validFrom
    //  * @param DateTime|null $validTill
    //  * @param boolean $suspended
    //  * @param User $by
    //  * @return boolean
    //  */
    // public function updateUser(Group $group, User $user, string $name, string $firstname = null, string $email, DateTime $validFrom = null, DateTime $validTill = null, bool $suspended, User $by): bool;
}