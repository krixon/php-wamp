<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\Message\Role\AnnouncesRouterRoles;
use Krixon\Wamp\Message\Role\Router;

class WelcomeDetails extends Dictionary
{
    use ContainsAgent;
    use AnnouncesRouterRoles;


    protected function __construct(Router ...$roles)
    {
        parent::__construct();

        if (empty($roles)) {
            throw new Exception\RolesMustBeAnnounced();
        }

        foreach ($roles as $role) {
            $this->addRoleAnnouncement($role);
        }
    }


    /**
     * @return static
     */
    public static function default(Router ...$roles) : self
    {
        return new static(...$roles);
    }
}