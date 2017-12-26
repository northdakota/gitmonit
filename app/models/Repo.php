<?php

/**
 * Class Repo
 */
class Repo extends \Phalcon\Mvc\Model
{

    /**
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $id;

    /**
     * @var integer
     * @Column(type="integer", length=20, nullable=false)
     */
    protected $chatId;

    /**
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $repository;

    /**
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $tags;

    /**
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $branches;

    /**
     * @var string
     * @Column(type="string", nullable=true)
     */
    protected $releases;

    /**
     * @var string
     * @Column(type="string", length=255, nullable=true)
     */
    protected $lastMasterCommit;

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field chatId
     *
     * @param integer $chatId
     * @return $this
     */
    public function setChatId($chatId)
    {
        $this->chatId = $chatId;

        return $this;
    }

    /**
     * Method to set the value of field repository
     *
     * @param string $repository
     * @return $this
     */
    public function setRepository($repository)
    {
        $this->repository = $repository;

        return $this;
    }

    /**
     * Method to set the value of field tags
     *
     * @param string $tags
     * @return $this
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Method to set the value of field branches
     *
     * @param string $branches
     * @return $this
     */
    public function setBranches($branches)
    {
        $this->branches = $branches;

        return $this;
    }

    /**
     * Method to set the value of field releases
     *
     * @param string $releases
     * @return $this
     */
    public function setReleases($releases)
    {
        $this->releases = $releases;

        return $this;
    }

    /**
     * Method to set the value of field lastMasterCommit
     *
     * @param string $lastMasterCommit
     * @return $this
     */
    public function setLastMasterCommit($lastMasterCommit)
    {
        $this->lastMasterCommit = $lastMasterCommit;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field chatId
     *
     * @return integer
     */
    public function getChatId()
    {
        return $this->chatId;
    }

    /**
     * Returns the value of field repository
     *
     * @return string
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * Returns the value of field tags
     *
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Returns the value of field branches
     *
     * @return string
     */
    public function getBranches()
    {
        return $this->branches;
    }

    /**
     * Returns the value of field releases
     *
     * @return string
     */
    public function getReleases()
    {
        return $this->releases;
    }

    /**
     * Returns the value of field lastMasterCommit
     *
     * @return string
     */
    public function getLastMasterCommit()
    {
        return $this->lastMasterCommit;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("gitmonit");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'repo';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Repo[]|Repo
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Repo
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
