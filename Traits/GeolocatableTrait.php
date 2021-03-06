<?php
namespace Volleyball\Bundle\CoreBundle\Traits;

trait GeolocatableTrait
{
    /**
     * Latitude
     * @var float
     */
    protected $latitude;
    
    /**
     * Longitude
     * @var float
     */
    protected $longitude;
    
    /**
     * Get latitude
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set latitude
     * @param float $lat
     * @return mixed
     */
    public function setLatitude($lat)
    {
        $this->latitude = $lat;

        return $this;
    }



    /**
     * Get longitude
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set longitude
     * @param float $lng
     * @return mixed
     */
    public function setLongitude($lng)
    {
        $this->longitude = $lng;

        return $this;
    }

    /**
     * Get coords
     * @param boolean $asString
     * @return array|string
     */
    public function getCoords($asString = false)
    {
        if ($asString) {
            return $this->getLatitude().', '.$this->getLongitude();
        }

        return array($this->getLatitude(), $this->getLongitude());
    }

    /**
     * Set coords
     * @param float|array $lat
     * @param float|null $lng
     * @return boolean|mixed
     */
    public function setCoords($lat, $lng = null)
    {
        if (!is_array($lat) && null == $lng) {
            return false;
        } elseif (is_array($lat)) {
            $this->setLatitude($lat['lat'])->setLongitude($lat['lng']);
        } else {
            $this->setLatitude($lat)->setLongitude($lng);
        }

        return $this;
    }

    /**
     * Set lat lng
     * @param array $latlng
     * @return mixed
     */
    public function setLatLng($latlng)
    {
        $this->setLatitude($latlng['lat']);
        $this->setLongitude($latlng['lng']);

        return $this;
    }

    /**
     * Get lat lng
     * @return array
     */
    public function getLatLng()
    {
        return array('lat'=>$this->getLatitude(),'lng'=>$this->getLongitude());
    }

}
