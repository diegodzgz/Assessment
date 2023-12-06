<?php
declare(strict_types=1);

namespace Assessment\RegisterValidation\Plugin;

use Magento\Framework\Webapi\Rest\Request as RestRequest;

class UserDataValidation
{
    private RestRequest $restRequest;

    /**
     * @param RestRequest $restRequest
     */
    public function __construct(
        RestRequest $restRequest,
    ) {
        $this->restRequest = $restRequest;
    }


    public function beforeExecute(
    ): void
    {
        $firstName = $this->restRequest->getParam("firstname");
        $this->restRequest->setPostValue("firstname", $this->validateName($firstName));
    }

    /**
     * @param string $firstName
     * @return string
     */
    public function validateName(string $firstName) : string
    {
        $pattern = "^[-a-zA-Z0-9-()]+(\s+[-a-zA-Z0-9-()]+)*$^";

        if (!preg_match($pattern, $firstName)){
            $firstName = trim($firstName);
        }

        return $firstName;
    }
}
