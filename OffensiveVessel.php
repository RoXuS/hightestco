<?php

/**
 * Offensive Vessel class
 *
 * This class describe an offensive vessel
 *
 * @package    SpaceDefense
 * @author     Rousseau Julien <julien.rss@gmail.com>
 */
class OffensiveVessel extends Vessel
{

    protected $_canons;
    protected $_shield;

    const BATTLESHIPS_CANONS = 24;
    const DESTROYERS_CANONS = 12;
    const CRUISERS_CANONS = 6;

    const BASE_SHIELD = 20;

    public function __construct($x, $y, $canons)
    {
        $this->setCanons($canons);
        $this->_shield = 0;
        parent::__construct($x, $y);
    }

    /**
     * Set the power of the canon
     *
     * @param int $canons
     * @return null
     */
    public function setCanons($canons)
    {
        if (in_array($canons, array(self::BATTLESHIPS_CANONS, self::DESTROYERS_CANONS, self::CRUISERS_CANONS))) {
            $this->_canons = $canons;
        }
    }

    /**
     * Share shield with a support vessel
     *
     * @param SupportVessel $supportVessel
     * @return null
     */
    public function shareShield(SupportVessel $supportVessel)
    {
        $supportVessel->setProtector($this);
    }

    /**
     * Set basic shield
     *
     * @return null
     */
    public function raiseShield()
    {
        $this->_shield = self::BASE_SHIELD;
    }

    /**
     * Attack a vessel
     *
     * @param Vesse $vessel
     * @return null
     */
    public function attackVessel(Vessel $vessel)
    {
        $vessel->receiveAttack($this->$_canons);
    }

    /**
     * Reduce shield
     *
     * @param int $attack
     * @return $_shield
     */
    public function reduceShield($attack)
    {
        return $this->_shield = $this->_shield - $attack;
    }

    /**
     * Receive attack (with shield protection)
     *
     * @param int $attack
     * @return null
     */
    public function receiveAttack($attack)
    {
        if ($this->_shield > 0) {
            $attackUnderTheShield = $this->reduceShield($attack);

            if ($attackUnderTheShield < 0) {
                parent::receiveAttack(abs($attackUnderTheShield));
            }
        } else {
            parent::receiveAttack($attack);
        }
    }
}

?>