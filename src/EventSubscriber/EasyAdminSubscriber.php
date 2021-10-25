<?php
namespace App\EventSubscriber;
use App\Entity\Post;
use App\Entity\User;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Security\Core\Security;

class EasyAdminSubscriber implements EventSubscriberInterface
{

private $slugger;
private $security;
public function __construct(SluggerInterface $slugger, Security $security)
{
    $this->slugger=$slugger;
    $this->security=$security;

}
public static function getSubscribedEvents()
{
    return [
         BeforeEntityPersistedEvent::class => ['setPostSlugAndDate'],
    ];
}

public function setPostSlugAndDate(BeforeEntityPersistedEvent $event)
{
    $entity= $event->getEntityInstance();
    if (!($entity instanceof Post)){
        return;
    }
    $slug= $this->slugger->slug($entity->getTitle());
    $entity->setSlug($slug);
    $now=new DateTime('now');
    $entity->setCreatedAt($now);
    $user=$this->security->getUser();
    $entity->setUser($user);
}
}