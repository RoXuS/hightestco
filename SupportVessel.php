<?php

/**
 * Support Vessel class
 *
 * This class describe a support vessel
 *
 * @package    SpaceDefense
 * @author     Rousseau Julien <julien.rss@gmail.com>
 */
class SupportVessel extends Vessel
{

    protected $_medicalUnit;
    protected $_shareShield;
    protected $_protector;

    /**
     * Receive task
     *
     * @param string $task
     * @return null
     */
    public function receiveTask($task)
    {

    }

    /**
     * Heal a vessel
     *
     * @param Vessel $vessel
     * @return null
     */
    public function healVessel(Vessel $vessel)
    {

    }

    /**
     * Set a protector for this support vessel (to share shield)
     *
     * @param OffensiveVessel $offensiveVessel
     * @return null
     */
    public function setProtector(OffensiveVessel $offensiveVessel)
    {
        $this->_protector = $offensiveVessel;
    }

    /**
     * Receive attack (with shield protection from protector)
     *
     * @param int $attack
     * @return null
     */
    public function receiveAttack($attack)
    {

        if (isset($this->_protector) && $this->_protector->_shield > 0) {
            $attackUnderTheShield = $this->_protector->reduceShield($attack);

            if ($attackUnderTheShield < 0) {
                parent::receiveAttack(abs($attackUnderTheShield));
            }
        } else {
            parent::receiveAttack($attack);
        }
    }
}

?>