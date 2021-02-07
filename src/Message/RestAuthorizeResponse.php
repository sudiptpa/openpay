<?php

namespace Omnipay\Openpay\Message;

use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Class RestAuthorizeResponse.
 */
class RestAuthorizeResponse extends AbstractRestResponse
    implements RedirectResponseInterface
{
    public function getOrderId()
    {
        return isset($this->data['orderId']) ? $this->data['orderId'] : null;
    }

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
     * Return HTML Form that will need to be submitted to go to the next step.
     * @deprecated Outdated information found in API Docs, please use redirectUrl
     * @see self::getRedirectUrl()
     *
     * @return string|null
     */
    public function getHiddenForm()
    {
        $next = $this->data['nextAction'];
        if ($next['type'] !== 'FormPost') {
            return null;
        }
        $out = '<form action="' . $next['formPost']['formPostUrl'] . '" method="POST">';
        foreach ($next['formPost']['formFields'] as $field) {
            $out .= '<input type="hidden" name="' . $field['fieldName'] . '" value="' . htmlspecialchars($field['fieldValue']) . '" />';
        }
        $out .= '</form>';

        return $out;
    }

    public function isRedirect()
    {
        (bool)$this->getRedirectUrl();
    }


    public function getRedirectUrl()
    {
        $url = null;
        if (isset($this->data['nextAction']['formPost']['formFields']) &&
            is_array($this->data['nextAction']['formPost']['formFields']))
            foreach ($this->data['nextAction']['formPost']['formFields'] as $field)
                if ($field['fieldName'] === 'TransactionToken')
                    $url = $field['fieldValue'];
        if ($url !== null) {
            $url = "{$this->data['nextAction']['formPost']['formPostUrl']}?TransactionToken={$url}";
        }
        return $url;
    }
}
