<?php
/**
 * BB's Zend Framework 2 Components
 * 
 * UI Components
 *
 * @package     [MyApplication]
 * @subpackage  BB's Zend Framework 2 Components
 * @subpackage  UI Components
 * @author      Björn Bartels <coding@bjoernbartels.earth>
 * @link        https://gitlab.bjoernbartels.earth/groups/zf2
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @copyright   copyright (c) 2016 Björn Bartels <coding@bjoernbartels.earth>
 */

namespace UIComponents\View\Helper\Components;

use Zend\Navigation\AbstractContainer;
use Zend\Navigation\Page\AbstractPage;
use Zend\View;
use UIComponents\View\Helper\Traits\ComponentAttributesTrait;

/**
 * Helper for printing breadcrumbs
 */
class Breadcrumbs extends \Zend\View\Helper\Navigation\Breadcrumbs
{ 
    use ComponentAttributesTrait;
    
    /**
     * default CSS class to use for Ol elements
     *
     * @var string
     */
    protected $olClass = 'breadcrumb nav-breadcrumb';

    /**
     * default CSS class to use for li elements
     *
     * @var string
     */
    protected $liClass = '';

    /**
     * determine if to display bootstrap OL breadcrums or Zend's default link list 
     *
     * @var boolean
     */
    protected $noList = false;

    /**
     * header/label to display if not empty
     *
     * @var string
     */
    protected $header = '';

    /**
     * default CSS class to use for header/label display
     *
     * @var string
     */
    protected $headerClass = 'header';

    /**
     * Helper entry point
     *
     * @param  string|AbstractContainer $container container to operate on
     * @return Breadcrumbs
     */
    public function __invoke($container = 'navigation')
    {
        if (null !== $container) {
            $this->setContainer($container);
        }

        return (clone $this);
    }

    /**
     * Renders breadcrumbs by chaining 'a' elements with the separator
     * registered in the helper
     *
     * @param    string|AbstractContainer $container [optional] container to render. Default is
     *                                        to render the container registered in the helper.
     * @return string
     */
    public function renderStraight($container = 'navigation')
    {
        $html = '';
        if ($this->getNoList()) {
            $html .= parent::renderStraight($container);
        } {
            $html .= $this->renderOl($container);
        }
        return $html; 
    }
    
    public function renderOl($container = 'navigation')
    {
        $this->parseContainer($container);
        if (null === $container) {
            $container = $this->getContainer();
        }

        // find deepest active
        if (!$active = $this->findActive($container)) {
            return '';
        }

        $active = $active['page'];
        /** @var \Zend\View\Helper\EscapeHtml $escaper */
        $escaper = $this->view->plugin('escapeHtml');
        
        $listHtmlOpen = '<ol class="'.$this->getOlClass().'" data-test="layout-breadcrumbs">' . PHP_EOL;
        if ( !empty($this->getHeader()) ) {
            $listHtmlOpen .= '<li class="' . $escaper($this->getHeaderClass()) . '" data-test="layout-breadcrumbs-header">' . $escaper($this->getHeader()) . '</li>' . PHP_EOL;
        }
        // put the deepest active page last in breadcrumbs
        if ($this->getLinkLast()) {
            $html = '<li class="active" data-test="layout-breadcrumbs-current">' . $this->htmlify($active) . '</li>' . PHP_EOL;
        } else {
            $html = '<li class="active" data-test="layout-breadcrumbs-current">' . $escaper(
                $this->translate($active->getLabel()) //, $active->getTextDomain())
            ) . '</li>' . PHP_EOL;
        }

        // walk back to root
        while ($parent = $active->getParent()) {
            if ($parent instanceof AbstractPage) {
                // prepend crumb to html
                $html = '<li data-test="layout-breadcrumbs-parent'.$parent->getLabel().'">' . $this->htmlify($parent) . '</li>' . PHP_EOL
                    //. $this->getSeparator()
                    . $html;
            }

            if ($parent === $container) {
                // at the root of the given container
                break;
            }

            $active = $parent;
        }

        $listHtmlClose = '</ol>' . PHP_EOL;
        
        return strlen($html) ? $listHtmlOpen . $this->getIndent() . $html . $listHtmlClose : '';
    }

    /**
     * Returns an HTML string containing an 'a' element for the given page
     *
     * @param  AbstractPage $page  page to generate HTML for
     * @return string              HTML string (<a href="…">Label</a>)
     */
    public function htmlify(AbstractPage $page)
    {
        $label = $this->translate($page->getLabel(), $page->getTextDomain());
        $title = $this->translate($page->getTitle(), $page->getTextDomain());

        // get attribs for anchor element
        $attribs = [
            'id'     => $page->getId(),
            'title'  => $title,
            'class'  => $page->getClass(),
            'href'   => $page->getHref(),
            'target' => $page->getTarget(),
            'data-test' => 'cta-breadcrumbs-' . $this->slugify($page->getLabel())
        ];

        /** @var \Zend\View\Helper\EscapeHtml $escaper */
        $escaper = $this->view->plugin('escapeHtml');
        $label   = $escaper($label);

        return '<a' . $this->htmlAttribs($attribs) . '>' . $label . '</a>';
    }
    
    /**
     * @return the $olClass
     */
    public function getOlClass() {
        return $this->olClass;
    }

    /**
     * @param string $olClass
     * 
     * @return Breadcrumbs
     */
    public function setOlClass($olClass) {
        $this->olClass = $olClass;
        return $this;
    }

    /**
     * @return the $liClass
     */
    public function getLiClass() {
        return $this->liClass;
    }

    /**
     * @param string $liClass
     * 
     * @return Breadcrumbs
     */
    public function setLiClass($liClass) {
        $this->liClass = $liClass;
        return $this;
    }
    
    /**
     * @return the $noList
     */
    public function getNoList() {
        return $this->noList;
    }

    /**
     * @param boolean $noList
     * 
     * @return Breadcrumbs
     */
    public function setNoList($noList) {
        $this->noList = $noList;
        return $this;
    }
    
    /**
     * @return the $header
     */
    public function getHeader() {
        return $this->header;
    }

    /**
     * @param string $header
     * 
     * @return Breadcrumbs
     */
    public function setHeader($header) {
        $this->header = $header;
        return $this;
    }
    
    /**
     * @return the $headerClass
     */
    public function getHeaderClass() {
        return $this->headerClass;
    }

    /**
     * @param string $headerClass
     * 
     * @return Breadcrumbs
     */
    public function setHeaderClass($headerClass) {
        $this->headerClass = $headerClass;
        return $this;
    }



}