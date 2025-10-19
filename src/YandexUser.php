<?php

namespace mnwb\OAuth2\Client\Provider;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;

class YandexUser implements ResourceOwnerInterface
{
    private array $response;

    /**
     * Creates a new instance of YandexResourceOwner class.
     *
     * @param array $response
     */
    public function __construct(array $response)
    {
        $this->response = $response;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getResponseValue('id');
    }

    /**
     * Gets display name.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->getResponseValue('display_name');
    }

    /**
     * Gets user nickname.
     *
     * @return string|null
     */
    public function getNickname(): ?string
    {
        return $this->getResponseValue('login');
    }

    /**
     * @return string|null DD.MM.YYYY
     */
    public function getBirthday(): ?string
    {
    if ($this->getResponseValue('birthday'))
        return date("d.m.Y", strtotime ($this->getResponseValue('birthday')));
    return null;
    }

    /**
     * Gets user email.
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->getResponseValue('default_email');
    }

    /**
     * Get locale.
     *
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return null;
    }

    /**
     * Gets first name.
     *
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->getResponseValue('first_name');
    }

    /**
     * User's avatar link
     *
     * @return string|null
     */
    public function getAvatar(): ?string
    {
        return null;
    }


    /**
     * Gets last name.
     *
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->getResponseValue('last_name');
    }

    /**
     * Gets the gender.
     *
     * @return string|null
     */
    public function getGender(): ?string
    {
        return $this->getResponseValue('sex');
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return $this->response;
    }

    /**
     * @param $key
     *
     * @return mixed|null
     */
    private function getResponseValue($key)
    {
        return $this->response[$key] ?? null;
    }
}
