<?php

namespace Root;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="pages")
 */
class Page
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    protected $Id;
    /** 
     * @ORM\Column(type="string")
     */
    protected $pageName;
    /** 
     * @ORM\Column(type="string")
     */
    protected $pageHeader;
    /** 
     * @ORM\Column(type="string")
     */
    protected $pageContent;

    public function getId()
    {
        return $this->Id;
    }

    public function getPageName()
    {
        return $this->pageName;
    }

    public function setPageName($pageName)
    {
        $this->pageName = $pageName;
    }

    public function getPageHeader()
    {
        return $this->pageHeader;
    }

    public function setPageHeader($pageHeader)
    {
        $this->pageHeader = $pageHeader;
    }

    public function getPageContent()
    {
        return $this->pageContent;
    }

    public function setPageContent($pageContent)
    {
        $this->pageContent = $pageContent;
    }
}
