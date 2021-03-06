<?php
namespace Volleyball\Bundle\CoreBundle\Traits;

trait SluggableTrait
{
    /**
     * Slug
     * @var string
     */
    protected $slug;

    /**
     * Set slug
     * @param string $slug
     * @return mixed
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
