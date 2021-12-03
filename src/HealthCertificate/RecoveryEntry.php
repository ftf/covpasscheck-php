<?php

namespace stwon\CovPassCheck\HealthCertificate;

use Carbon\Carbon;
use DateTime;
use Exception;

class RecoveryEntry
{
    private string $target;
    private DateTime $testDate;
    private string $locationCountryCode;
    private DateTime $certificateValidFrom;
    private DateTime $certificateValidUntil;
    private string $certificateIssuer;
    private string $certificateId;

    /**
     * @throws Exception
     */
    public function __construct(
        string $target,
        $testDate,
        string $locationCountryCode,
        $certificateValidFrom,
        $certificateValidUntil,
        string $certificateIssuer,
        string $certificateId
    )
    {
        $this->target = $target;
        $this->locationCountryCode = $locationCountryCode;
        $this->certificateIssuer = $certificateIssuer;
        $this->certificateId = $certificateId;

        if (is_string($testDate)) {
            $this->testDate = new DateTime($testDate);
        } else {
            $this->testDate = $testDate;
        }

        if (is_string($certificateValidFrom)) {
            $this->certificateValidFrom = new DateTime($certificateValidFrom);
        } else {
            $this->certificateValidFrom = $certificateValidFrom;
        }

        if (is_string($certificateValidUntil)) {
            $this->certificateValidUntil = new DateTime($certificateValidUntil);
        } else {
            $this->certificateValidUntil = $certificateValidUntil;
        }
    }

    /**
     * @return string
     */
    public function getTarget(): string
    {
        return $this->target;
    }

    /**
     * @return DateTime
     */
    public function getTestDate(): DateTime
    {
        return $this->testDate;
    }

    /**
     * @return string
     */
    public function getLocationCountryCode(): string
    {
        return $this->locationCountryCode;
    }

    /**
     * @return DateTime
     */
    public function getCertificateValidFrom(): DateTime
    {
        return $this->certificateValidFrom;
    }

    /**
     * @return DateTime
     */
    public function getCertificateValidUntil(): DateTime
    {
        return $this->certificateValidUntil;
    }

    /**
     * @return string
     */
    public function getCertificateIssuer(): string
    {
        return $this->certificateIssuer;
    }

    /**
     * @return string
     */
    public function getCertificateId(): string
    {
        return $this->certificateId;
    }

    public function isExpired(): bool
    {
        $now = Carbon::now();

        return $now->lessThan($this->certificateValidFrom) ||
            $now->greaterThan((new Carbon($this->certificateValidUntil))->endOfDay());
    }
}
