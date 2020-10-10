<?php

namespace Omnipay\Openpay\Message;

use Omnipay\Openpay\ItemBag;

/**
 * Class RestAuthorizeRequest.
 */
class RestAuthorizeRequest extends AbstractRequest
{
    public function getOrigin()
    {
        return $this->getParameter('origin');
    }

    public function setOrigin($value)
    {
        return $this->setParameter('origin', $value);
    }

    public function getFailedUrl()
    {
        return $this->getParameter('failedUrl');
    }

    public function setFailedUrl($value)
    {
        return $this->setParameter('failedUrl', $value);
    }

    public function getPlanCreationType()
    {
        return $this->getParameter('planCreationType');
    }

    public function setPlanCreationType($value)
    {
        return $this->setParameter('planCreationType', $value);
    }

    public function getChargeBackCount()
    {
        return $this->getParameter('chargeBackCount');
    }

    public function setChargeBackCount($value)
    {
        return $this->setParameter('chargeBackCount', $value);
    }

    public function getCustomerQuality()
    {
        return $this->getParameter('customerQuality');
    }

    public function setCustomerQuality($value)
    {
        return $this->setParameter('customerQuality', $value);
    }

    public function getDeliveryDate()
    {
        return $this->getParameter('deliveryDate');
    }

    public function getEmployeeCode()
    {
        return $this->getParameter('employeeCode');
    }

    public function setEmployeeCode($value)
    {
        return $this->setParameter('employeeCode', $value);
    }

    public function getCustomerId()
    {
        return $this->getParameter('customerId');
    }

    public function setCustomerId($value)
    {
        return $this->setParameter('customerId', $value);
    }

    public function getFirstName()
    {
        return $this->getParameter('firstName');
    }

    public function setFirstName($value)
    {
        return $this->setParameter('firstName', $value);
    }

    public function getOtherNames()
    {
        return $this->getParameter('otherNames');
    }

    public function setOtherNames($value)
    {
        return $this->setParameter('otherNames', $value);
    }

    public function getFamilyName()
    {
        return $this->getParameter('familyName');
    }

    public function setFamilyName($value)
    {
        return $this->setParameter('familyName', $value);
    }

    public function getEmail()
    {
        return $this->getParameter('email');
    }

    public function setEmail($value)
    {
        return $this->setParameter('email', $value);
    }

    public function getDateOfBirth()
    {
        return $this->getParameter('dateOfBirth');
    }

    public function setDateOfBirth($value)
    {
        return $this->setParameter('dateOfBirth', $value);
    }

    public function getGender()
    {
        return $this->getParameter('gender');
    }

    public function setGender($value)
    {
        return $this->setParameter('gender', $value);
    }

    public function getResidentialAddress1()
    {
        return $this->getParameter('residentialAddress1');
    }

    public function setResidentialAddress1($value)
    {
        return $this->setParameter('residentialAddress1', $value);
    }

    public function getResidentialAddress2()
    {
        return $this->getParameter('residentialAddress2');
    }

    public function setResidentialAddress2($value)
    {
        return $this->setParameter('residentialAddress2', $value);
    }

    public function getResidentialSuburb()
    {
        return $this->getParameter('residentialSuburb');
    }

    public function setResidentialState($value)
    {
        return $this->setParameter('residentialState', $value);
    }

    public function getResidentialPostCode()
    {
        return $this->getParameter('residentialPostCode');
    }

    public function setResidentialPostCode($value)
    {
        return $this->setParameter('residentialPostCode', $value);
    }

    public function getDeliveryAddress1()
    {
        return $this->getParameter('deliveryAddress1');
    }

    public function setDeliveryAddress1($value)
    {
        return $this->setParameter('deliveryAddress1', $value);
    }

    public function getDeliveryAddress2()
    {
        return $this->getParameter('deliveryAddress2');
    }

    public function setDeliveryAddress2($value)
    {
        return $this->setParameter('deliveryAddress2', $value);
    }

    public function getDeliverySuburb()
    {
        return $this->getParameter('deliverySuburb');
    }

    public function setDeliveryState($value)
    {
        return $this->setParameter('deliveryState', $value);
    }

    public function getDeliveryPostCode()
    {
        return $this->getParameter('deliveryPostCode');
    }

    public function setDeliveryPostCode($value)
    {
        return $this->setParameter('deliveryPostCode', $value);
    }

    public function setItems($items)
    {
        if ($items && !$items instanceof ItemBag) {
            $items = new ItemBag($items);
        }

        return $this->setParameter('items', $items);
    }

    public function getGoodsDescription()
    {
        return $this->getParameter('goodsDescription');
    }

    public function setGoodsDescription($value)
    {
        return $this->setParameter('goodsDescription', $value);
    }

    public function getPurchasePrice()
    {
        return $this->getParameter('purchasePrice');
    }

    public function setPurchasePrice($value)
    {
        return $this->setParameter('purchasePrice', $value);
    }

    public function getRetailerOrderNo()
    {
        return $this->getParameter('retailerOrderNo');
    }

    public function setRetailerOrderNo($value)
    {
        return $this->setParameter('retailerOrderNo', $value);
    }

    public function getData()
    {
        $this->validate('merchantId', 'planID', 'purchasePrice');

        return [
            'customerJourney' => [
                'origin' => $this->getOrigin(),
            ],
        ];
    }

    public function getCustomerDetails()
    {
        return [
            "firstName" => "string",
            "otherNames" => "string",
            "familyName" => "string",
            "email" => "string",
            "dateOfBirth" => "string",
            "gender" => "string",
            "phoneNumber" => "string",
            "residentialAddress" => [
                "line1" => "string",
                "line2" => "string",
                "suburb" => "string",
                "state" => "string",
                "postCode" => "string",
            ],
            "deliveryAddress" => [
                "line1" => "string",
                "line2" => "string",
                "suburb" => "string",
                "state" => "string",
                "postCode" => "string",
            ],
        ];
    }

    public function getCustomerJourney()
    {
        // {
        //   "customerJourney": {
        //     "origin": "Online",
        //     "online": {
        //       "callbackUrl": "string",
        //       "cancelUrl": "string",
        //       "failUrl": "string",
        //       "planCreationType": "string",
        //       "chargeBackCount": 0,
        //       "customerQuality": 0,
        //       "customerDetails": {
        //         "firstName": "string",
        //         "otherNames": "string",
        //         "familyName": "string",
        //         "email": "string",
        //         "dateOfBirth": "string",
        //         "gender": "string",
        //         "phoneNumber": "string",
        //         "residentialAddress": {
        //           "line1": "string",
        //           "line2": "string",
        //           "suburb": "string",
        //           "state": "string",
        //           "postCode": "string"
        //         },
        //         "deliveryAddress": {
        //           "line1": "string",
        //           "line2": "string",
        //           "suburb": "string",
        //           "state": "string",
        //           "postCode": "string"
        //         }
        //       },
        //       "deliveryDate": "string"
        //     },
        //     "posApp": {
        //       "employeeCode": "string",
        //       "customerId": "string"
        //     },
        //     "posWeb": {
        //       "planCreationType": "string",
        //       "employeeCode": "string",
        //       "callbackUrl": "string",
        //       "cancelUrl": "string",
        //       "failUrl": "string"
        //     }
        //   },
        //   "goodsDescription": "string",
        //   "purchasePrice": 0,
        //   "retailerOrderNo": "string",
        //   "cart": [
        //     {
        //       "itemName": "string",
        //       "itemGroup": "string",
        //       "itemCode": "string",
        //       "itemGroupCode": "string",
        //       "itemRetailUnitPrice": 0,
        //       "itemQty": "string",
        //       "itemRetailCharge": 0
        //     }
        //   ]
        // }
    }

    public function sendData($data = [])
    {
        $headers = $this->getHeaders();

        $url = $this->getEndpoint();

        $response = $this->httpClient->get($url, $headers, $data = [])->send();

        $data = json_decode($response->getBody(), true);

        return $this->createResponse($data, $response->getHeaders(), $response->getStatusCode());
    }

    protected function getEndpoint()
    {
        return parent::getEndpoint() . 'orders';
    }

    /**
     * @param $data
     * @param array $headers
     * @param $status
     *
     * @return \Omnipay\Openpay\Message\RestAuthorizeResponse
     */
    protected function createResponse($data, $headers = [], $status = 404)
    {
        return $this->response = new RestAuthorizeResponse($this, $data, $headers, $status);
    }
}
