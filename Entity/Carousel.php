<?php
namespace Volleyball\Bundle\CoreBundle\Entity;

use \Doctrine\Common\Collections\ArrayCollection;

use \Volleyball\Bundle\CoreBundle\Traits\SluggableTrait;
use \Volleyball\Bundle\CoreBundle\Traits\TimestampableTrait;

class Carousel
{
    use SluggableTrait;
    use TimestampableTrait;
    
    /**
     * Id
     * @var integer
     */
    protected $id;
    
    /**
     * Name
     * @var string
     */
    protected $name;
    
    /**
     * Items
     * @var \Volleyball\Bundle\CoreBundle\Entity\CarouselItem
     */
    protected $items;
    
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
     * @return \Volleyball\Bundle\CoreBundle\Entity\Carousel
     */
    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }

    /**
     * Get items
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set items
     * @param array $items
     * @return \Volleyball\Bundle\CoreBundle\Entity\Carousel
     */
    public function setItems(array $items)
    {
        if (!$items instanceof ArrayCollection) {
            $items = new ArrayCollection($items);
        }

        $this->items = $items;

        return $this;
    }
    
    /**
     * Add item
     * @param \Volleyball\Bundle\CoreBundle\Entity\CarouselItem $item
     * @return \Volleyball\Bundle\CoreBundle\Entity\Carousel
     */
    public function addItem(\Volleyball\Bundle\CoreBundle\Entity\CarouselItem $item)
    {
        $this->items->add($item);
        
        return $this;
    }

    /**
     * Has items
     * @return boolean
     */
    public function hasItems()
    {
        return !$this->items->isEmpty();
    }

    /**
     * Get item
     * @param string $item
     * @return \Volleyball\Bundle\CoreBundle\Entity\CarouselItem
     */
    public function getItem($item)
    {
        return $this->items->get($item);
    }
        
    /**
     * Remove item
     * @param \Volleyball\Bundle\CoreBundle\Entity\CarouselItem $item
     * @return \Volleyball\Bundle\CoreBundle\Entity\Carousel
     */
    public function removeItem(\Volleyball\Bundle\CoreBundle\Entity\CarouselItem $item)
    {
        unset($this->items[$item]);

        return $this;
    }
}
