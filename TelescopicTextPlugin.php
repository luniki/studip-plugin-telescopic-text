<?php

# Copyright (c)  2011  <mlunzena@uos.de>
#
# Permission is hereby granted, free of charge, to any person obtaining a copy
# of this software and associated documentation files (the "Software"), to deal
# in the Software without restriction, including without limitation the rights
# to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
# copies of the Software, and to permit persons to whom the Software is
# furnished to do so, subject to the following conditions:
#
# The above copyright notice and this permission notice shall be included in all
# copies or substantial portions of the Software.
#
# THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
# IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
# FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
# AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
# LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
# OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
# SOFTWARE.

class TelescopicTextPlugin extends StudipPlugin implements SystemPlugin
{

    function __construct()
    {
        parent::__construct();

        PageLayout::addStylesheet($this->getPluginUrl() . '/telescopic.css');
        PageLayout::addScript($this->getPluginUrl() . '/telescopic.js');

        # Woraround for #2329
        new StudipFormat();

        StudipFormat::addStudipMarkup('telescopic', '\{\{([^|]+)\|', '\}\}', 'TelescopicTextPlugin::markupTelescope');
    }

    function markupTelescope($markup, $matches, $contents)
    {
        return sprintf('<span class="a"><span class="b">%s</span><span class="c">%s</span></span>',
                       $markup->format($matches[1]), $markup->format($contents));
    }
}
