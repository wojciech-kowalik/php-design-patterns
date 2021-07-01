<?php

namespace DesignPatterns\Structural\Adapter;

/**
 * @author Wojciech Kowalik <kontakt@wojciech-kowalik.pl>
 * @package Structural\Adapter
 */
interface IRenderTemplate
{
    public function renderHeader(): string;
    public function renderBody(): string;
    public function renderFooter(): string;
}
