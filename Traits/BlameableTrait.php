<?php
namespace Volleyball\Bundle\CoreBundle\Traits;

trait BlameableTrait
{
    /**
     * CreatedBy
     * @var \Volleyball\Bundle\UserBundle\Entity\User
     */
    protected $createdBy;
    
    /**
     * UpdatedBy
     * @var \Volleyball\Bundle\UserBundle\Entity\User
     */
    protected $updatedBy;

    /**
     * Get created by
     * @return \Volleyball\Bundle\UserBundle\Entity\User
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set created by
     * @param \Volleyball\Bundle\UserBundle\Entity\User $user
     * @return mixed
     */
    public function setCreatedBy(\Volleyball\Bundle\UserBundle\Entity\User $user)
    {
        $this->createdBy = $user;

        return this;
    }

    /**
     * Get updated by
     * @return \Volleyball\Bundle\UserBundle\Entity\User
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Set updated by
     * @param \Volleyball\Bundle\UserBundle\Entity\User $user
     * @return mixed
     */
    public function setUpdatedBy(\Volleyball\Bundle\UserBundle\Entity\User $user)
    {
        $this->updated_by = $user;

        return $this;
    }
}
