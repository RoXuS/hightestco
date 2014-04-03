<?php

/**
 * Basic Vessel class
 *
 * This class describe a support vessel
 *
 * @package    SpaceDefense
 * @author     Rousseau Julien <julien.rss@gmail.com>
 */
class Vessel
{
    protected $_x;
    protected $_y;
    protected $_life;
    protected $_destroy;

    public function __construct($x, $y)
    {
        if (isset($x) && isset($y)) {
            $this->moveTo($x, $y);
        }
        $this->_life = 10;
        $this->destroy = 0;
    }

    /**
     * Move the vessel to position x, y
     *
     * @param int $x
     * @param int $y
     * @return null
     */
    public function moveTo($x, $y)
    {
        $this->_x = $x;
        $this->_y = $y;
    }

    /**
     * Receive basic attack (whithout shield or protector)
     *
     * @param int $attack
     * @return null
     */
    public function receiveAttack($attack)
    {
        $this->_life = $this->_life - $attack;
        if ($this->_life <= 0) {
            $this->destroy();
        }
    }

    /**
     * Set destroy status
     *
     * @return null
     */
    public function destroy()
    {
        $this->_destroy = 1;
    }
}

?>
