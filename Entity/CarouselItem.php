<?php
namespace Volleyball\Bundle\CoreBundle\Entity;

use \Doctrine\Common\Collections\ArrayCollection;

use \Volleyball\Bundle\CoreBundle\Traits\SluggableTrait;
use \Volleyball\Bundle\CoreBundle\Traits\TimestampableTrait;

class CarouselItem
{
    use SluggableTrait;
    use TimestampableTrait;
    
    /**
     * Name
     * @var string
     */
    protected $name;
    
    /**
     * Caption
     * @var string
     */
    protected $caption;
    
    /**
     * Image
     * @var string
     */
    protected $image;
    
    /**
     * Carousel
     * @var \Volleyball\Bundle\CoreBundle\Entity\Carousel 
     */
    protected $carousel;
    
    /**
     * Get name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Set name
     * @param string $name
     * @return \Volleyball\Bundle\CoreBundle\Entity\CarouselItem
     */
    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }

    /**
     * Get caption
     * @return string
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Set caption
     * @param string $caption
     * @return \Volleyball\Bundle\CoreBundle\Entity\CarouselItem
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;

        return $this;
    }

    /**
     * Get image
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set image
     * @param string $image
     * @return \Volleyball\Bundle\CoreBundle\Entity\CarouselItem
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
    
    /**
     * Get carousel
     * @return \Volleyball\Bundle\CoreBundle\Entity\Carousel
     */
    public function getCarousel()
    {
        return $this->carousel;
    }
    
    /**
     * Set carousel
     * @param \Volleyball\Bundle\CoreBundle\Entity\Carousel $carousel
     * @return \Volleyball\Bundle\CoreBundle\Entity\CarouselItem
     */
    public function setCarousel(\Volleyball\Bundle\CoreBundle\Entity\Carousel $carousel)
    {
        $this->carousel = $carousel;
        
        return $this;
    }
}
