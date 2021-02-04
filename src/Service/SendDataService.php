<?php


namespace App\Service;


use Doctrine\ORM\EntityManagerInterface;

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
            .'Horsepower'.$car['horsepower']
        ))
            ->setFrom('test@example.com')
            ->setTo('test2@example.com');

        $this->mailer->send($message);

    }

}