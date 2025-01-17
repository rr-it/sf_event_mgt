<?php

declare(strict_types=1);

/*
 * This file is part of the Extension "sf_event_mgt" for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace DERHANSEN\SfEventMgt\Domain\Model\Dto;

use DateTime;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Search demand
 */
class SearchDemand
{
    protected string $search = '';
    protected string $fields = '';
    protected ?DateTime $startDate = null;
    protected ?DateTime $endDate = null;

    /**
     * @return string
     */
    public function getSearch(): string
    {
        return $this->search;
    }

    /**
     * @param string $search
     */
    public function setSearch(string $search): void
    {
        $this->search = $search;
    }

    /**
     * @return string
     */
    public function getFields(): string
    {
        return $this->fields;
    }

    /**
     * @param string $fields
     */
    public function setFields(string $fields): void
    {
        $this->fields = $fields;
    }

    /**
     * @return DateTime|null
     */
    public function getStartDate(): ?DateTime
    {
        return $this->startDate;
    }

    /**
     * @param DateTime|null $startDate
     */
    public function setStartDate(?DateTime $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return DateTime|null
     */
    public function getEndDate(): ?DateTime
    {
        return $this->endDate;
    }

    /**
     * @param DateTime|null $endDate
     */
    public function setEndDate(?DateTime $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * Returns if the demand object has at least one search property set
     *
     * @return bool
     */
    public function getHasQuery(): bool
    {
        return $this->search !== '' || $this->startDate !== null || $this->endDate !== null;
    }

    public function toArray(): array
    {
        return [
            'search' => $this->search,
            'fields' => $this->fields,
            'startDate' => $this->startDate ? $this->startDate->format(DateTime::RFC3339) : null,
            'endDate' => $this->endDate ? $this->endDate->format(DateTime::RFC3339) : null,
        ];
    }

    public static function fromArray(array $data): self
    {
        $demand = GeneralUtility::makeInstance(SearchDemand::class);
        $demand->setSearch($data['search'] ?? '');
        $demand->setFields($data['fields'] ?? '');
        if (isset($data['startDate'])) {
            $demand->setStartDate(DateTime::createFromFormat(DateTime::RFC3339, (string)$data['startDate']));
        }
        if (isset($data['endDate'])) {
            $demand->setEndDate(DateTime::createFromFormat(DateTime::RFC3339, (string)$data['endDate']));
        }

        return $demand;
    }
}
