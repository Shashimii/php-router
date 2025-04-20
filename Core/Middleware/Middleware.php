<?php

namespace Core\Middleware;

Class Middleware {
    // holds the class keys
    public const MAP = [
        'auth' => Auth::class,  // do it like Auth::class instead of 'Auth'
        'guest' => Guest::class // so it will find the class in the same namespace
    ];

    // resolves the middleware key
    public static function resolve($key) { // static context function 
        // if the key is null
        if (!$key) {
            return;
        }

        // find the key on the MAP
        $middleware = static::MAP[$key] ?? false; // static::MAP instead of $this->MAP (static context)

        // if the key is not on the MAP
        if (!$middleware) {
            throw new \Exception("No matching Middleware found for key " . $key . ".");
        }

        // short form of
        // $instance = new Key;
        // $instance->handle();

        (new $middleware)->handle(); // create instance of the middleware and triggers the handle function
    }


}