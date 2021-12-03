<?php

namespace stwon\CovPassCheck\Trust;

use Exception;
use JsonException;

class FileTrustStore extends TrustStore
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * @throws JsonException
     * @throws Exception
     */
    public function fetchTrustAnchors(): array
    {
        $data = json_decode(file_get_contents($this->filePath), true, 512, JSON_THROW_ON_ERROR);

        $anchors = [];
        foreach ($data['certificates'] as $certificate) {
            $anchors[] = new TrustAnchor(
                $certificate['certificateType'],
                $certificate['country'],
                $certificate['kid'],
                "-----BEGIN CERTIFICATE-----\n" . $certificate['rawData'] . "\n-----END CERTIFICATE-----",
                $certificate['signature'],
                $certificate['thumbprint'],
                new \DateTime($certificate['timestamp']),
            );
        }

        return $anchors;
    }
}
