<?php

declare(strict_types=1);

namespace Krixon\Wamp\Message;

use Krixon\Wamp\Message\Role\AnnouncesClientRoles;
use Krixon\Wamp\Message\Role\Client;

class HelloDetails extends Dictionary
{
    use ContainsAgent;
    use AnnouncesClientRoles;


    protected function __construct(Client ...$roles)
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
    public static function default(Client ...$roles) : self
    {
        return new static(...$roles);
    }
}