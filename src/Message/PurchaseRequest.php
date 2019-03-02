<?php

namespace Omnipay\Openpay\Message;

/**
 * Class PurchaseRequest.
 */
class PurchaseRequest extends AbstractRequest
{
    /**
     * Prepare Data for API.
     *
     * @return array
     */
    public function getData()
    {
        $this->validate('authToken', 'planID', 'purchasePrice');

        return [
            'JamCallbackURL'     => $this->getReturnUrl(),
            'JamCancelURL'       => $this->getCancelUrl(),
            'JamFailURL'         => $this->getCancelUrl(),
            'JamAuthToken'       => $this->getAuthToken(),
            'JamPlanID'          => $this->getPlanID(),
            'JamRetailerOrderNo' => $this->getRetailerOrderNo(),
            'JamPrice'           => $this->getPurchasePrice(),
            'JamFirstName'       => $this->getFirstName(),
            'JamOtherNames'      => $this->getMiddleName(),
            'JamFamilyName'      => $this->getLastName(),
            'JamEmail'           => $this->getEmail(),
            'JamAddress1'        => $this->getAddress1(),
            'JamAddress2'        => $this->getAddress2(),
            'JamSuburb'          => $this->getCity(),
            'JamState'           => $this->getState(),
            'JamPostCode'        => $this->getPostcode(),
            'JamPhoneNumber'     => $this->getPhone(),
            'JamPurchasePrice'   => $this->getPurchasePrice(),
        ];
    }

    /**
     * @param $data
     *
     * @return mixed
     */
    public function sendData($data)
    {
        $redirectUrl = $this->getEndpoint().'?'.http_build_query($data);

        return $this->response = new PurchaseResponse($this, $data, $redirectUrl);
    }

    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }
}
