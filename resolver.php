<?php

class MyCustomResolver {

    public function __invoke($source, $args, $context, \GraphQL\Type\Definition\ResolveInfo $info)
    {
        return $source['prefix'] . $args['message'];
    
        /* if (is_array($source) || $source instanceof \ArrayAccess) {
            if (isset($source[$fieldName])) {
                $property = $source[$fieldName];
            }
        } else if (is_object($source)) {
            if (isset($source->{$fieldName})) {
                $property = $source->{$fieldName};
            }
        }

        return $property instanceof Closure ? $property($source, $args, $context, $info) : $property; */
    }
}