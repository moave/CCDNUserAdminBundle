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

namespace CCDNUser\AdminBundle\Model\FrontModel;

use Symfony\Component\Security\Core\User\UserInterface;

use CCDNUser\AdminBundle\Model\FrontModel\BaseModel;
use CCDNUser\AdminBundle\Model\FrontModel\ModelInterface;

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
 */
class UserModel extends BaseModel implements ModelInterface
{
    /**
     *
     * @access public
     * @param  int                                          $page
     * @param  int                                          $itemsPerPage
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function findAllUsersPaginated($page = 1, $itemsPerPage = 25)
    {
        return $this->getRepository()->findAllUsersPaginated($page, $itemsPerPage);
    }

    /**
     *
     * @access public
     * @param  char                                         $alpha
     * @param  int                                          $page
     * @param  int                                          $itemsPerPage
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function findAllUsersFilteredAtoZPaginated($alpha, $page = 1, $itemsPerPage = 25)
    {
        return $this->getRepository()->findAllUsersFilteredAtoZPaginated($alpha, $page, $itemsPerPage);
    }

    /**
     *
     * @access public
     * @param  int                                          $page
     * @param  int                                          $itemsPerPage
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function findAllUnactivatedUsersPaginated($page, $itemsPerPage = 25)
    {
        return $this->getRepository()->findAllUnactivatedUsersPaginated($page, $itemsPerPage);
    }

    /**
     *
     * @access public
     * @param  int                                          $page
     * @param  int                                          $itemsPerPage
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function findAllBannedUsersPaginated($page, $itemsPerPage = 25)
    {
        return $this->getRepository()->findAllBannedUsersPaginated($page, $itemsPerPage);
    }

    /**
     *
     * @access public
     * @param  \Datetime                                    $dateLimit
     * @param  int                                          $page
     * @param  int                                          $itemsPerPage
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function findAllNewestUsersPaginated(\Datetime $dateLimit, $page, $itemsPerPage = 25)
    {
        return $this->getRepository()->findAllNewestUsersPaginated($dateLimit, $page, $itemsPerPage);
    }

    /**
     *
     * @access public
     * @param  int                                          $userId
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function findOneUserById($userId)
    {
        return $this->getRepository()->findOneUserById($userId);
    }

    /**
     *
     * @access public
     * @param  \Symfony\Component\Security\Core\User\UserInterface       $user
     * @return \CCDNUser\AdminBundle\Model\Component\Manager\UserManager
     */
    public function updateUser(UserInterface $user)
    {
        return $this->getManager()->updateUser($user);
    }

    /**
     *
     * @access public
     * @param  \Symfony\Component\Security\Core\User\UserInterface       $user
     * @return \CCDNUser\AdminBundle\Model\Component\Manager\UserManager
     */
    public function banUser(UserInterface $user)
    {
        return $this->getManager()->banUser($user);
    }

    /**
     *
     * @access public
     * @param  \Symfony\Component\Security\Core\User\UserInterface       $user
     * @return \CCDNUser\AdminBundle\Model\Component\Manager\UserManager
     */
    public function unbanUser(UserInterface $user)
    {
       return $this->getManager()->unbanUser($user);
    }

    /**
     *
     * @access public
     * @param  \Symfony\Component\Security\Core\User\UserInterface       $user
     * @return \CCDNUser\AdminBundle\Model\Component\Manager\UserManager
     */
    public function activateUser(UserInterface $user)
    {
        return $this->getManager()->activateUser($user);
    }

    /**
     *
     * @access public
     * @param  \Symfony\Component\Security\Core\User\UserInterface       $user
     * @return \CCDNUser\AdminBundle\Model\Component\Manager\UserManager
     */
    public function deactivateUser(UserInterface $user)
    {
        return $this->getManager()->deactivateUser($user);
    }
}
