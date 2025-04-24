<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

// Classe LocaleSubscriber implémente EventSubscriberInterface
class LocaleSubscriber implements EventSubscriberInterface
{
    private string $defaultLocale; // Locale par défaut

    // Constructeur avec un paramètre de locale par défaut
    public function __construct(string $defaultLocale = 'fr')
    {
        $this->defaultLocale = $defaultLocale;
    }

    // Méthode appelée lors de l'événement KernelEvents::REQUEST
    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();

        // Vérifie si la session précédente existe
        if (!$request->hasPreviousSession()) {
            return;
        }

        // Récupère la locale depuis la session ou utilise la locale par défaut
        $locale = $request->getSession()->get('_locale', $this->defaultLocale);
        $request->setLocale($locale); // Définit la locale pour la requête
    }

    // Définit les événements auxquels la classe est abonnée
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => [['onKernelRequest', 20]], // Priorité 20
        ];
    }
}
