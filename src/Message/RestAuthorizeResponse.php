<?php

namespace Omnipay\Openpay\Message;

use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Class RestAuthorizeResponse.
 */
class RestAuthorizeResponse extends AbstractRestResponse implements RedirectResponseInterface
{
    public function getRedirectMethod()
    {
        return 'GET';
    }

    public function getRedirectData()
    {
        return [];
    }

    public function getOrderId()
    {
        return isset($this->data['orderId']) ? $this->data['orderId'] : null;
    }

    /**
     * @return bool
     */
    public function isSuccessful()
    {
        $statusCode = $this->getStatusCode();

        return $statusCode >= 200 && $statusCode <= 399;
    }

    public function getBlackListMatch()
    {
        return isset($this->data['blackListMatch']) ? $this->data['blackListMatch'] : null;
    }

    public function getNextAction()
    {
        return isset($this->data['nextAction']) ? $this->data['nextAction'] : null;
    }

    /**
     * @return string
     */
    public function getTransactionToken()
    {
        if ($this->isRequestFormPost()) {
            $stack = $this->data['nextAction']['formPost']['formFields'];

            foreach ($stack as $field) {
                if ($field['fieldName'] == 'TransactionToken') {
                    return $field['fieldValue'];
                }
            }
        }
    }

    /**
     * @return string
     */
    public function getPlanID()
    {
        if ($this->isRequestFormPost()) {
            $stack = $this->data['nextAction']['formPost']['formFields'];

            foreach ($stack as $field) {
                if ($field['fieldName'] == 'JamPlanID') {
                    return $field['fieldValue'];
                }
            }
        }
    }

    public function isRequestFormPost()
    {
        return isset($this->data['nextAction']['type']) && $this->data['nextAction']['type'] == 'FormPost';
    }

    /**
     * @return bool
     */
    public function isRedirect()
    {
        return $this->isRequestFormPost();
    }

    /**
     * @return string
     */
    public function getRedirectUrl()
    {
        if ($this->isRequestFormPost()) {
            $url = $this->data['nextAction']['formPost']['formPostUrl'];

            return $url.'?TransactionToken='.$this->getTransactionToken();
        }
    }
}
