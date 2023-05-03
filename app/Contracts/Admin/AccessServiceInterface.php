<?php

namespace App\Contracts\Admin;

use App\Meetad\Models\Group;
use App\Meetad\Models\User;

interface AccessServiceInterface
{
     /**
     * Get user accesses
     *
     * @param Group $group
     * @param User $user
     * @return Access[]
     */
    public function getAccesses(Group $group, User $user ): array;

    /**
     * Mass access assignment
     *
     * @param User $admin
     * @param Group $group
     * @param User $user
     * @param array $accesses
     * @return boolean
     */
    public function massAssignment(User $admin, Group $group, User $user, array $accesses): bool;

    /**
     * Get access label by id
     *
     * @param integer[] $ids
     * @return array
     */
    public function getLabelsByIds(array $ids): array;

    /**
     * Get access by key
     * @param string $key
     * @return object
     */
    public function getAccessByKey(string $key): object;
}
