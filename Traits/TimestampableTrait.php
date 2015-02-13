<?php
namespace Volleyball\Bundle\CoreBundle\Traits;

trait TimestampableTrait
{
    /**
     * Created at
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * Updated at
     * @var \DateTime 
     */
    protected $updatedAt;

    /**
     * Set created at
     * @param \DateTime $createdAt
     * @return mixed
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Get created at
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updated at
     * @param \DateTime $updatedAt
     * @return mixed
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * Get updated at
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated;
    }
}
