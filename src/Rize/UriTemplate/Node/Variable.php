<?php

namespace Rize\UriTemplate\Node;

/**
 * Description
 */
class Variable extends Abstraction
{
    /**
    * Variable name without modifier
    * e.g. 'term:1' becomes 'term'
    */
    public string $name;
    public array $options = ['modifier' => null, 'value'    => null];

    public function __construct($token, array $options = [])
    {
        parent::__construct($token);
        $this->options = $options + $this->options;

        // normalize var name e.g. from 'term:1' becomes 'term'
        $name = $token;
        if ($options['modifier'] === ':') {
            $name = substr((string) $name, 0, strpos((string) $name, $options['modifier']));
        }

        $this->name = $name;
    }
}
