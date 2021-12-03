<?php

namespace stwon\CovPassCheck\HealthCertificate;

use DateTime;
use Exception;

class TestEntry
{
    public const TEST_RESULT_DETECTED = "260373001";
    public const TEST_RESULT_NOT_DETECTED = "260415000";

    private string $target;
    private string $testType;
    private ?string $testName;
    private ?string $testDeviceIdentifier;
    private DateTime $testDate;
    private string $testResult;
    private ?string $testingFacility;
    private string $locationCountryCode;
    private string $certificateIssuer;
    private string $certificateId;

    /**
     * @throws Exception
     */
    public function __construct(
        string $target,
        string $testType,
        ?string $testName,
        ?string $testDeviceIdentifier,
        $testDate,
        string $testResult,
        ?string $testingFacility,
        string $locationCountryCode,
        string $certificateIssuer,
        string $certificateId
    )
    {
        $this->target               = $target;
        $this->testType             = $testType;
        $this->testName             = $testName;
        $this->testDeviceIdentifier = $testDeviceIdentifier;
        $this->testResult           = $testResult;
        $this->testingFacility      = $testingFacility;
        $this->locationCountryCode  = $locationCountryCode;
        $this->certificateIssuer    = $certificateIssuer;
        $this->certificateId        = $certificateId;

        if (is_string($testDate)) {
            $this->testDate = new DateTime($testDate);
        } else {
            $this->testDate = $testDate;
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
     * @return string
     */
    public function getTestType(): string
    {
        return $this->testType;
    }

    /**
     * @return string|null
     */
    public function getTestName(): ?string
    {
        return $this->testName;
    }

    /**
     * @return string|null
     */
    public function getTestDeviceIdentifier(): ?string
    {
        return $this->testDeviceIdentifier;
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
    public function getTestResult(): string
    {
        return $this->testResult;
    }

    /**
     * @return string
     */
    public function getTestingFacility(): string
    {
        return $this->testingFacility;
    }

    /**
     * @return string
     */
    public function getLocationCountryCode(): string
    {
        return $this->locationCountryCode;
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

    public function isPositive(): bool
    {
        return $this->testResult === self::TEST_RESULT_DETECTED;
    }

    public function isNegative(): bool
    {
        return $this->testResult === self::TEST_RESULT_NOT_DETECTED;
    }
}
