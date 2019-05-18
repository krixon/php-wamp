<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message\Role;

trait AnnouncesRouterRoles
{
    use AnnouncesRoles;


    /**
     * @return static
     */
    public function withRoleAnnouncement(Router $role) : self
    {
        $instance = clone $this;

        $instance->addRoleAnnouncement($role);

        return $instance;
    }
}