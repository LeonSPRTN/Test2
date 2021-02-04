<?php


namespace App\Service;


use Doctrine\ORM\EntityManagerInterface;
use mysql_xdevapi\Exception;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Log\Logger;

class SendDataService
{
    /**
     * @var \Swift_Mailer
     */
    private \Swift_Mailer $mailer;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * SendDataService constructor.
     * @param \Swift_Mailer $mailer
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(\Swift_Mailer $mailer, EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
    }

    public function send(array $car)
    {
        $message = (new \Swift_Message('Name: '.$car['name'].'\n'
            .'Brand: '.$car['brand'].'\n'
            .'Horsepower: '.$car['horsepower']
        ))
            ->setFrom('******@yandex.ru')
            ->setTo('*******@mail.ru');

        $this->mailer->send($message);
    }

}