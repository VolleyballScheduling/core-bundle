<?php
namespace Volleyball\Bundle\CoreBundle\Entity;

use \Volleyball\Bundle\CoreBundle\Traits\SluggableTrait;
use \Volleyball\Bundle\CoreBundle\Traits\GeolocatableTrait;
use \Volleyball\Bundle\CoreBundle\Traits\TimestampableTrait;

/**
* @ORM\Entity(repositoryClass="AddressRepository")
* @ORM\Table(name="address_book")
*/
class Address
{
    use GeolocatableTrait;
    use TimestampableTrait;
    use SluggableTrait;
    
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
     * Street
     * @var string
     */
    protected $street;
    
    /**
     * Suburb
     * @var string
     */
    protected $suburb;
    
    /**
     * City
     * @var string
     */
    protected $city;
    
    /**
     * Zone
     * @var string
     */
    protected $zone;
    
    /**
     * Country
     * @var string
     */
    protected $country;
    
    /**
     * PostalCode
     * @var string
     */
    protected $postalCode;
    
    /**
     * User
     * @var \Volleyball\Bundle\UserBundle\Entity\User
     */
    protected $user;
    
    /**
     * Get id
     * @return integer
     */
    public function getId()
    {
        return $this->id;
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
     * @return \Volleyball\Bundle\CoreBundle\Entity\Address
     */
    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }

    /**
    * Get street
    * @return string
    */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set streets
     * @param string $street
     * @return \Volleyball\Bundle\CoreBundle\Entity\Address
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }
    
    /**
     * Get suburb
     * @return string
     */
    public function getSuburb()
    {
        return $this->suburb;
    }

    /**
     * Set suburb
     * @param string $suburb
     * @return \Volleyball\Bundle\CoreBundle\Entity\Address
     */
    public function setSuburb($suburb)
    {
        $this->suburb = $suburb;

        return $this;
    }

    /**
     * Get city
     * @return strings
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set city
     * @param string $city
     * @return \Volleyball\Bundle\CoreBundle\Entity\Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

   /**
    * Get zone
    * @return string
    */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * Set zone
     * @param string $zone
     * @return \Volleyball\Bundle\CoreBundle\Entity\Address
     */
    public function setZone($zone)
    {
        $this->zone = $zone;

        return $this;
    }

    /**
     * Get country
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set country
     * @param string $country
     * @return \Volleyball\Bundle\CoreBundle\Entity\Address
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get postal code
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set postal code
     * @param string $postalCode
     * @return \Volleyball\Bundle\CoreBundle\Entity\Address
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Format address
     * @param array $address
     * @param string $sep
     * @return string
     */
    public static function formatAddress(array $address, $sep = ", ")
    {
        $values = array_map(
            'trim',
            array(
                sprintf("%s %s", $address['first_name'], $address['last_name']),
                $address['address'],
                $address['postal_code'],
                $address['city']
            )
        );

        foreach ($values as $key => $val) {
            if (!$val) {
                unset($values[$key]);
            }
        }

        $fullAddress = implode($sep, $values);

        if ($countryCode = trim($address['country_code'])) {
            if ($fullAddress) {
                $fullAddress .= " ";
            }

            $fullAddress .= sprintf("(%s)", $countryCode);
        }

        return $fullAddress;
    }
}
