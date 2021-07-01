<?php

namespace DesignPatterns\Structural\Adapter;

use DesignPatterns\Structural\Adapter\IPDFTemplate;
use DesignPatterns\Structural\Adapter\IRenderTemplate;

/**
 * Adapter class
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Adapter
 */
class PDFRenderAdapter implements IRenderTemplate
{
    private $pdfTemplate;

    /**
     * @param \DesignPatterns\Structural\Adapter\IPDFTemplate $pdfTemplate
     */
    public function __construct(IPDFTemplate $pdfTemplate)
    {
        $this->pdfTemplate = $pdfTemplate;
    }

    /**
     * @inheritDoc
     */
    public function renderHeader(): string
    {
        return $this->pdfTemplate->renderTop();
    }

    /**
     * @inheritDoc
     */
    public function renderBody(): string
    {
        return $this->pdfTemplate->renderMiddle();
    }

    /**
     * @inheritDoc
     */
    public function renderFooter(): string
    {
        return $this->pdfTemplate->renderBottom();
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return "header: {$this->renderHeader()} \nbody: {$this->renderBody()} \nfooter: {$this->renderFooter()} \n";
    }

}
