<?php


namespace App\EventSubscriber;


use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\User;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;
use phpDocumentor\Reflection\DocBlock\Tags\Method;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class jwtEvent implements EventSubscriberInterface
{


    private $security;

    /**
     * jwtEvent constructor.
     * @param RequestStack
     */
    public function __construct(RequestStack $security)
    {
        $this->security = $security;
    }


    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['onAuthenticationSuccess', EventPriorities::PRE_WRITE]
        ];
    }

    public function onAuthenticationSuccess(AuthenticationSuccessEvent $event)
    {
        $data = $event->getData();
        $user = $event->getUser();
        if (!$user instanceof UserInterface) {
            return;
        }
        if ($user instanceof User) {
            $data['data'] = array(
                'id' => $user->getId(),
                'email' => $user->getEmail(),
                'test' => true
            );
            $event->setData($data);
        }
    }
}