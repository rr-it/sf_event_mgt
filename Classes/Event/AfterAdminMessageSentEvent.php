<?php

declare(strict_types=1);

/*
 * This file is part of the Extension "sf_event_mgt" for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace DERHANSEN\SfEventMgt\Event;

use DERHANSEN\SfEventMgt\Domain\Model\Registration;
use DERHANSEN\SfEventMgt\Service\NotificationService;

/**
 * This event is triggered after a admin message has been sent
 */
final class AfterAdminMessageSentEvent
{
    private Registration $registration;
    private string $body;
    private string $subject;
    private array $attachments;
    private string $senderName;
    private string $senderEmail;
    private NotificationService $notificationService;
    private int $messageType;

    public function __construct(
        Registration $registration,
        string $body,
        string $subject,
        array $attachments,
        string $senderName,
        string $senderEmail,
        int $messageType,
        NotificationService $notificationService
    ) {
        $this->registration = $registration;
        $this->body = $body;
        $this->subject = $subject;
        $this->attachments = $attachments;
        $this->senderName = $senderName;
        $this->senderEmail = $senderEmail;
        $this->notificationService = $notificationService;
        $this->messageType = $messageType;
    }

    public function getRegistration(): Registration
    {
        return $this->registration;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getAttachments(): array
    {
        return $this->attachments;
    }

    public function getSenderName(): string
    {
        return $this->senderName;
    }

    public function getSenderEmail(): string
    {
        return $this->senderEmail;
    }

    public function getNotificationService(): NotificationService
    {
        return $this->notificationService;
    }

    public function getMessageType(): int
    {
        return $this->messageType;
    }
}
