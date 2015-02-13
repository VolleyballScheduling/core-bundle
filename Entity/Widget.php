<?php
namespace Volleyball\Bundle\CoreBundle\Entity;

use \Doctrine\Common\Collections\ArrayCollection;

use \Volleyball\Bundle\CoreBundle\Traits\SluggableTrait;
use \Volleyball\Bundle\CoreBundle\Traits\TimestampableTrait;

class Widget
{
    use SluggableTrait;
    use TimestampableTrait;
    
    /**
     * Id
     * @var integer
     */
    protected $id;
    
     /**
      * name
      * @var string
      */
    protected $name;
    
    /**
     * Label
     * @var string
     */
    protected $label;
    
    /**
     * Controller
     * @var string
     */
    protected $controller;
    
    /**
     * Roles
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $roles;
    
    /**
     * Template
     * @var string 
     */
    protected $template;
    
    /**
     * construct
     */
    public function __construct()
    {
        $this->roles = new ArrayCollection(array('ROLE_USER'));
        $this->template = null;
        $this->label = null;
    }
    
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
     * @return \Volleyball\Bundle\CoreBundle\Entity\Widget
     */
    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }
    
    /**
     * Get label
     * @return string
     */
    public function getLabel()
    {
        if (is_null($this->label) || '' == $this->label) {
            return $this->name;
        }
        
        return $this->label;
    }
    
    /**
     * Set label
     * @param string|null $label
     * @return \Volleyball\Bundle\CoreBundle\Entity\Widget
     */
    public function setLabel($label = null)
    {
        $this->label = $label;
        
        return $this;
    }
    
    /**
     * Get controller
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }
    
    /**
     * Set controller
     * @param string $controller
     * @return \Volleyball\Bundle\CoreBundle\Entity\Widget
     * @throws \Exception
     */
    public function setController($controller)
    {
        if (is_null($controller)) {
            throw new \Exception('The controller value can not be null.');
        }
        
        $this->controller = $controller;
        
        return $this;
    }
    
    /**
     * Get roles
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getRoles()
    {
        return $this->roles;
    }
    
    /**
     * Set roles
     * @param array $roles
     * @return \Volleyball\Bundle\CoreBundle\Entity\Widget
     */
    public function setRoles(array $roles, $overwrite = true)
    {
        if ($overwrite) {
            $this->roles = $roles;
        } else {
            foreach ($roles as $role) {
                $this->roles->add($role);
            }
        }
        
        return $this;
    }
    
    /**
     * Add role
     * @param string $role
     * @return \Volleyball\Bundle\CoreBundle\Entity\Widget
     */
    public function addRole($role)
    {
        $this->roles->add($role);
        
        return $this;
    }
    
    /**
     * Remove role
     * @param string $role
     * @return \Volleyball\Bundle\CoreBundle\Entity\Widget
     */
    public function removeRole($role)
    {
        $this->roles->remove($role);
        
        return $this;
    }
    
    /**
     * Has role
     * @param string $role
     * @return boolean
     */
    public function hasRole($role)
    {
        return $this->roles->contains($role);
    }
    
    /**
     * Get template
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }
    
    /**
     * Set template
     * @param string $template
     * @return \Volleyball\Bundle\CoreBundle\Entity\Widget
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        
        return $this;
    }
    
    /**
     * ResolvedController
     * @return string
     * @throws \Exception
     */
    public function resolvedController()
    {
        $annotationReader = new \Doctrine\Common\Annotations\AnnotationReader();
        $reflectionMethod = new \ReflectionMethod($this->controller, 'widgetAction');
        $methodAnnotations = $annotationReader->getMethodAnnotations($reflectionMethod);
        foreach ($methodAnnotations as $annotation) {
            if ($annotation instanceof \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route) {
                if (empty($annotation)) {
                    throw new \Exception("The name is not configured in the annotation");
                }
                
                return $annotation->getName();
            }
        }
        throw new \Exception("There is no route annotation");
    }
}
