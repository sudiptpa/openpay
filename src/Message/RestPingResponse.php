<?php

namespace Omnipay\Openpay\Message;

/**
 * Class RestPingResponse.
 */
class RestPingResponse extends AbstractRestResponse
{
    public function isSuccessful()
    {
        $statusCode = $this->getStatusCode();

        return $statusCode >= 200 && $statusCode <= 399;
    }

    /**
     * Gets API Version Application Name.
     *
     * @return string|null
     */
    public function getApplicationName()
    {
        return isset($this->data['applicationName']) ? (string) $this->data['applicationName'] : null;
    }

    /**
     * Get API Version String.
     *
     * @return string|null
     */
    public function getApplicationVersion()
    {
        return isset($this->data['applicationVersion']) ? (string) $this->data['applicationVersion'] : null;
    }

    /**
     * Get API Environment Name (eg TrainingAU).
     *
     * @return string|null
     */
    public function getEnvironmentName()
    {
        return isset($this->data['environmentName']) ? (string) $this->data['environmentName'] : null;
    }
}
