<?php

/*
 * This file is part of the CCDNUser AdminBundle
 *
 * (c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/>
 *
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CCDNUser\AdminBundle\Model\Manager;

use Doctrine\ORM\QueryBuilder;

use CCDNUser\AdminBundle\Model\Manager\ManagerInterface;
use CCDNUser\AdminBundle\Model\Gateway\GatewayInterface;
use CCDNUser\AdminBundle\Model\Model\ModelInterface;

/**
 *
 * @category CCDNUser
 * @package  AdminBundle
 *
 * @author   Reece Fowell <reece@codeconsortium.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 2.0
 * @link     https://github.com/codeconsortium/CCDNUserAdminBundle
 *
 * @abstract
 */
abstract class BaseManager implements ManagerInterface
{
    /**
     *
     * @access protected
     * @var \CCDNUser\AdminBundle\Model\Gateway\GatewayInterface $gateway
     */
    protected $gateway;

    /**
     *
     * @access protected
     * @var \CCDNUser\AdminBundle\Model\Model\ModelInterface $model
     */
    protected $model;

    /**
     *
     * @access public
     * @param \CCDNUser\AdminBundle\Model\Gateway\GatewayInterface $gateway
     */
    public function __construct(GatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    /**
     *
     * @access public
     * @param  \CCDNUser\AdminBundle\Model\Model\ModelInterface     $model
     * @return \CCDNUser\AdminBundle\Model\Gateway\GatewayInterface
     */
    public function setModel(ModelInterface $model)
    {
        $this->model = $model;
		
		return $this;
    }

    /**
     *
     * @access public
     * @return \CCDNUser\AdminBundle\Model\Gateway\GatewayInterface
     */
    public function getGateway()
    {
        return $this->gateway;
    }

    /**
     *
     * @access public
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getQueryBuilder()
    {
        return $this->gateway->getQueryBuilder();
    }

    /**
     *
     * @access public
     * @param  string                                       $column  = null
     * @param  Array                                        $aliases = null
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function createCountQuery($column = null, Array $aliases = null)
    {
        return $this->gateway->createCountQuery($column, $aliases);
    }

    /**
     *
     * @access public
     * @param  Array                                        $aliases = null
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function createSelectQuery(Array $aliases = null)
    {
        return $this->gateway->createSelectQuery($aliases);
    }

    /**
     *
     * @access public
     * @param  \Doctrine\ORM\QueryBuilder                   $qb
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function one(QueryBuilder $qb)
    {
        return $this->gateway->one($qb);
    }

    /**
     *
     * @access public
     * @param  \Doctrine\ORM\QueryBuilder $qb
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function all(QueryBuilder $qb)
    {
        return $this->gateway->all($qb);
    }

    /**
     *
     * @access public
     * @param  Object                                               $entity
     * @return \CCDNUser\AdminBundle\Model\Manager\ManagerInterface
     */
    public function persist($entity)
    {
        $this->gateway->persist($entity);

        return $this;
    }

    /**
     *
     * @access public
     * @param  Object                                               $entity
     * @return \CCDNUser\AdminBundle\Model\Manager\ManagerInterface
     */
    public function remove($entity)
    {
        $this->gateway->remove($entity);

        return $this;
    }

    /**
     *
     * @access public
     * @return \CCDNUser\AdminBundle\Model\Manager\ManagerInterface
     */
    public function flush()
    {
        $this->gateway->flush();

        return $this;
    }

    /**
     *
     * @access public
     * @param  Object                                               $entity
     * @return \CCDNUser\AdminBundle\Model\Manager\ManagerInterface
     */
    public function refresh($entity)
    {
        $this->gateway->refresh($entity);

        return $this;
    }
}
