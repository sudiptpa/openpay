<?php

namespace Omnipay\Openpay\Message;

/**
 * Class RestPingRequest.
 */
class RestPingRequest extends AbstractRestRequest
{
    /**
     * @return array
     */
    public function getData()
    {
        return [];
    }

    public function sendData($data = [])
    {
        $headers = $this->getHeaders();

        $url = $this->getEndpoint();

        $response = $this->httpClient->get($url, $headers, $data = [])->send();

        $data = json_decode($response->getBody(), true);

        return $this->createResponse($data, $response->getHeaders(), $response->getStatusCode());
    }

    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return parent::getEndpoint().'diagnostics/version';
    }

    /**
     * @param $data
     * @param array $headers
     * @param $status
     *
     * @return \Omnipay\Openpay\Message\RestPingResponse
     */
    protected function createResponse($data, $headers = [], $status = 404)
    {
        return $this->response = new RestPingResponse($this, $data, $headers, $status);
    }
}
