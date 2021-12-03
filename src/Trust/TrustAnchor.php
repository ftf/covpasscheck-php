<?php

namespace stwon\CovPassCheck\Trust;

use DateTime;

class TrustAnchor implements TrustAnchorContract
{
    private string $certificateType;
    private string $country;
    private string $kid;
    private string $certificate;
    private string $signature;
    private string $thumbprint;
    private DateTime $timestamp;

    public function __construct(
        string $certificateType,
        string $country,
        string $kid,
        string $certificate,
        string $signature,
        string $thumbprint,
        DateTime $timestamp
    )
    {
        $this->certificateType = $certificateType;
        $this->country         = $country;
        $this->kid             = $kid;
        $this->certificate     = $certificate;
        $this->signature       = $signature;
        $this->thumbprint      = $thumbprint;
        $this->timestamp       = $timestamp;
    }

    /**
     * @return string
     */
    public function getCertificateType(): string
    {
        return $this->certificateType;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getKid(): string
    {
        return $this->kid;
    }

    /**
     * @return string
     */
    public function getCertificate(): string
    {
        return $this->certificate;
    }

    /**
     * @return string
     */
    public function getSignature(): string
    {
        return $this->signature;
    }

    /**
     * @return string
     */
    public function getThumbprint(): string
    {
        return $this->thumbprint;
    }

    /**
     * @return DateTime
     */
    public function getTimestamp(): DateTime
    {
        return $this->timestamp;
    }
}
