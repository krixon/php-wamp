<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message\Role;

trait AnnouncesClientRoles
{
    use AnnouncesRoles;


    /**
     * @return static
     */
    public function withRoleAnnouncement(Client $role) : self
    {
        $instance = clone $this;

        $instance->addRoleAnnouncement($role);

        return $instance;
    }
}