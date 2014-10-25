# Levitated Laravel Helpers

This package is an extension of [Laravel Helpers](http://laravel.com/docs/helpers) adding a few useful methods.

## Installation

1) Update ```composer.json```:

Add the following to your ```required``` section:

```"levitated/helpers": "*"```

After these changes, your ```composer.json``` file should look like this:

2) Run ```composer update```

## Configuration

1) Update ```app/config/app.php``` to add service provider and an alias:

```
    'providers' => array(
        ...
        'Levitated\Notifications\HelpersServiceProvider',
    ),

    'aliases' => array(
        ..
        'LH' => 'Levitated\Helpers\LH'
    ),
```

## Documentation

### LH::getVal

Replaces the usual:

```
    if (!empty($array[$key])) {
        return $key;
    } else {
        return $default;
    }
```

with

```
    return LH::getVal($key, $array);
```

getVal can do more, check the docs in the code!

### LH::isObjectEmpty

It's ```empty()``` on steroids. For array/objects it will determine if any of its keys, attributes, sub-arrays etc. has a non-empty value. For instance, this

```php
    [ 'emails' => []]
```

Will be considered empty.


### LH::implodeWithAnd

```php
    LH::implodeWithAnd(['foo', 'bar', 'foobar'])
```

will return ```"foo, bar and foobar"```
