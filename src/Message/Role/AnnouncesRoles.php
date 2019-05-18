<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message\Role;

use function array_key_exists;

trait AnnouncesRoles
{
    /** @var Role[] */
    private $roles = [];


    public function hasRoleAnnouncementNamed(string $name) : bool
    {
        return array_key_exists($name, $this->roles);
    }


    private function addRoleAnnouncement(Role $role) : void
    {
        $this->roles[$role::name()] = $role;
    }
}