<?php

namespace AndyFranklin\UrlShortApiBundle\Entity;

/**
 * Url
 */
class Url
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $originalUrl;

    /**
     * @var string
     */
    private $shortUrl;

    /**
     * @var string
     */
    private $userIp;

    /**
     * @var \DateTime
     */
    private $dateCreated;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set originalUrl
     *
     * @param string $originalUrl
     *
     * @return Url
     */
    public function setOriginalUrl($originalUrl)
    {
        $this->originalUrl = $originalUrl;

        return $this;
    }

    /**
     * Get originalUrl
     *
     * @return string
     */
    public function getOriginalUrl()
    {
        return $this->originalUrl;
    }

    /**
     * Set shortUrl
     *
     * @param string $shortUrl
     *
     * @return Url
     */
    public function setShortUrl($shortUrl)
    {
        $this->shortUrl = $shortUrl;

        return $this;
    }

    /**
     * Get shortUrl
     *
     * @return string
     */
    public function getShortUrl()
    {
        return $this->shortUrl;
    }

    /**
     * Set userIp
     *
     * @param string $userIp
     *
     * @return Url
     */
    public function setUserIp($userIp)
    {
        $this->userIp = $userIp;

        return $this;
    }

    /**
     * Get userIp
     *
     * @return string
     */
    public function getUserIp()
    {
        return $this->userIp;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     *
     * @return Url
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }
}

