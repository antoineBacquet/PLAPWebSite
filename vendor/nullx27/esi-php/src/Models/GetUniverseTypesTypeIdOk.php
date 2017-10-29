<?php
/**
 * GetUniverseTypesTypeIdOk
 *
 * PHP version 5
 *
 * @category Class
 * @package  nullx27\ESI
 * @author   Swaagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * EVE Swagger Interface
 *
 * An OpenAPI for EVE Online
 *
 * OpenAPI spec version: 0.4.9.dev1
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace nullx27\ESI\Models;

use \ArrayAccess;

/**
 * GetUniverseTypesTypeIdOk Class Doc Comment
 *
 * @category    Class */
 // @description 200 ok object
/**
 * @package     nullx27\ESI
 * @author      Swagger Codegen team
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class GetUniverseTypesTypeIdOk implements ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'get_universe_types_type_id_ok';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'capacity' => 'float',
        'description' => 'string',
        'dogmaAttributes' => '\nullx27\ESI\Models\GetUniverseTypesTypeIdDogmaAttribute[]',
        'dogmaEffects' => '\nullx27\ESI\Models\GetUniverseTypesTypeIdDogmaEffect[]',
        'graphicId' => 'int',
        'groupId' => 'int',
        'iconId' => 'int',
        'mass' => 'float',
        'name' => 'string',
        'portionSize' => 'int',
        'published' => 'bool',
        'radius' => 'float',
        'typeId' => 'int',
        'volume' => 'float'
    ];

    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'capacity' => 'capacity',
        'description' => 'description',
        'dogmaAttributes' => 'dogma_attributes',
        'dogmaEffects' => 'dogma_effects',
        'graphicId' => 'graphic_id',
        'groupId' => 'group_id',
        'iconId' => 'icon_id',
        'mass' => 'mass',
        'name' => 'name',
        'portionSize' => 'portion_size',
        'published' => 'published',
        'radius' => 'radius',
        'typeId' => 'type_id',
        'volume' => 'volume'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'capacity' => 'setCapacity',
        'description' => 'setDescription',
        'dogmaAttributes' => 'setDogmaAttributes',
        'dogmaEffects' => 'setDogmaEffects',
        'graphicId' => 'setGraphicId',
        'groupId' => 'setGroupId',
        'iconId' => 'setIconId',
        'mass' => 'setMass',
        'name' => 'setName',
        'portionSize' => 'setPortionSize',
        'published' => 'setPublished',
        'radius' => 'setRadius',
        'typeId' => 'setTypeId',
        'volume' => 'setVolume'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'capacity' => 'getCapacity',
        'description' => 'getDescription',
        'dogmaAttributes' => 'getDogmaAttributes',
        'dogmaEffects' => 'getDogmaEffects',
        'graphicId' => 'getGraphicId',
        'groupId' => 'getGroupId',
        'iconId' => 'getIconId',
        'mass' => 'getMass',
        'name' => 'getName',
        'portionSize' => 'getPortionSize',
        'published' => 'getPublished',
        'radius' => 'getRadius',
        'typeId' => 'getTypeId',
        'volume' => 'getVolume'
    ];

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    public static function setters()
    {
        return self::$setters;
    }

    public static function getters()
    {
        return self::$getters;
    }

    

    

    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     * @param mixed[] $data Associated array of property values initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['capacity'] = isset($data['capacity']) ? $data['capacity'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['dogmaAttributes'] = isset($data['dogmaAttributes']) ? $data['dogmaAttributes'] : null;
        $this->container['dogmaEffects'] = isset($data['dogmaEffects']) ? $data['dogmaEffects'] : null;
        $this->container['graphicId'] = isset($data['graphicId']) ? $data['graphicId'] : null;
        $this->container['groupId'] = isset($data['groupId']) ? $data['groupId'] : null;
        $this->container['iconId'] = isset($data['iconId']) ? $data['iconId'] : null;
        $this->container['mass'] = isset($data['mass']) ? $data['mass'] : null;
        $this->container['name'] = isset($data['name']) ? $data['name'] : null;
        $this->container['portionSize'] = isset($data['portionSize']) ? $data['portionSize'] : null;
        $this->container['published'] = isset($data['published']) ? $data['published'] : null;
        $this->container['radius'] = isset($data['radius']) ? $data['radius'] : null;
        $this->container['typeId'] = isset($data['typeId']) ? $data['typeId'] : null;
        $this->container['volume'] = isset($data['volume']) ? $data['volume'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];
        if ($this->container['description'] === null) {
            $invalid_properties[] = "'description' can't be null";
        }
        if ($this->container['groupId'] === null) {
            $invalid_properties[] = "'groupId' can't be null";
        }
        if ($this->container['name'] === null) {
            $invalid_properties[] = "'name' can't be null";
        }
        if ($this->container['published'] === null) {
            $invalid_properties[] = "'published' can't be null";
        }
        if ($this->container['typeId'] === null) {
            $invalid_properties[] = "'typeId' can't be null";
        }
        return $invalid_properties;
    }

    /**
     * validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properteis are valid
     */
    public function valid()
    {
        if ($this->container['description'] === null) {
            return false;
        }
        if ($this->container['groupId'] === null) {
            return false;
        }
        if ($this->container['name'] === null) {
            return false;
        }
        if ($this->container['published'] === null) {
            return false;
        }
        if ($this->container['typeId'] === null) {
            return false;
        }
        return true;
    }


    /**
     * Gets capacity
     * @return float
     */
    public function getCapacity()
    {
        return $this->container['capacity'];
    }

    /**
     * Sets capacity
     * @param float $capacity capacity number
     * @return $this
     */
    public function setCapacity($capacity)
    {
        $this->container['capacity'] = $capacity;

        return $this;
    }

    /**
     * Gets description
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     * @param string $description description string
     * @return $this
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets dogmaAttributes
     * @return \nullx27\ESI\Models\GetUniverseTypesTypeIdDogmaAttribute[]
     */
    public function getDogmaAttributes()
    {
        return $this->container['dogmaAttributes'];
    }

    /**
     * Sets dogmaAttributes
     * @param \nullx27\ESI\Models\GetUniverseTypesTypeIdDogmaAttribute[] $dogmaAttributes dogma_attributes array
     * @return $this
     */
    public function setDogmaAttributes($dogmaAttributes)
    {
        $this->container['dogmaAttributes'] = $dogmaAttributes;

        return $this;
    }

    /**
     * Gets dogmaEffects
     * @return \nullx27\ESI\Models\GetUniverseTypesTypeIdDogmaEffect[]
     */
    public function getDogmaEffects()
    {
        return $this->container['dogmaEffects'];
    }

    /**
     * Sets dogmaEffects
     * @param \nullx27\ESI\Models\GetUniverseTypesTypeIdDogmaEffect[] $dogmaEffects dogma_effects array
     * @return $this
     */
    public function setDogmaEffects($dogmaEffects)
    {
        $this->container['dogmaEffects'] = $dogmaEffects;

        return $this;
    }

    /**
     * Gets graphicId
     * @return int
     */
    public function getGraphicId()
    {
        return $this->container['graphicId'];
    }

    /**
     * Sets graphicId
     * @param int $graphicId graphic_id integer
     * @return $this
     */
    public function setGraphicId($graphicId)
    {
        $this->container['graphicId'] = $graphicId;

        return $this;
    }

    /**
     * Gets groupId
     * @return int
     */
    public function getGroupId()
    {
        return $this->container['groupId'];
    }

    /**
     * Sets groupId
     * @param int $groupId group_id integer
     * @return $this
     */
    public function setGroupId($groupId)
    {
        $this->container['groupId'] = $groupId;

        return $this;
    }

    /**
     * Gets iconId
     * @return int
     */
    public function getIconId()
    {
        return $this->container['iconId'];
    }

    /**
     * Sets iconId
     * @param int $iconId icon_id integer
     * @return $this
     */
    public function setIconId($iconId)
    {
        $this->container['iconId'] = $iconId;

        return $this;
    }

    /**
     * Gets mass
     * @return float
     */
    public function getMass()
    {
        return $this->container['mass'];
    }

    /**
     * Sets mass
     * @param float $mass mass number
     * @return $this
     */
    public function setMass($mass)
    {
        $this->container['mass'] = $mass;

        return $this;
    }

    /**
     * Gets name
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     * @param string $name name string
     * @return $this
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets portionSize
     * @return int
     */
    public function getPortionSize()
    {
        return $this->container['portionSize'];
    }

    /**
     * Sets portionSize
     * @param int $portionSize portion_size integer
     * @return $this
     */
    public function setPortionSize($portionSize)
    {
        $this->container['portionSize'] = $portionSize;

        return $this;
    }

    /**
     * Gets published
     * @return bool
     */
    public function getPublished()
    {
        return $this->container['published'];
    }

    /**
     * Sets published
     * @param bool $published published boolean
     * @return $this
     */
    public function setPublished($published)
    {
        $this->container['published'] = $published;

        return $this;
    }

    /**
     * Gets radius
     * @return float
     */
    public function getRadius()
    {
        return $this->container['radius'];
    }

    /**
     * Sets radius
     * @param float $radius radius number
     * @return $this
     */
    public function setRadius($radius)
    {
        $this->container['radius'] = $radius;

        return $this;
    }

    /**
     * Gets typeId
     * @return int
     */
    public function getTypeId()
    {
        return $this->container['typeId'];
    }

    /**
     * Sets typeId
     * @param int $typeId type_id integer
     * @return $this
     */
    public function setTypeId($typeId)
    {
        $this->container['typeId'] = $typeId;

        return $this;
    }

    /**
     * Gets volume
     * @return float
     */
    public function getVolume()
    {
        return $this->container['volume'];
    }

    /**
     * Sets volume
     * @param float $volume volume number
     * @return $this
     */
    public function setVolume($volume)
    {
        $this->container['volume'] = $volume;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(\nullx27\ESI\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        }

        return json_encode(\nullx27\ESI\ObjectSerializer::sanitizeForSerialization($this));
    }
}

