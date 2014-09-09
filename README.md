# Levitated Laravel Helpers

This package is an extension of [Laravel Helpers](http://laravel.com/docs/helpers) adding a few useful methods.

## Installation

Update ```composer.json```:

Add the following to your ```required``` section:

  "levitated/helpers": "*"

After these changes, your ```composer.json``` file should look like this:

Run ```composer update```

In ```config/app.php``` add service provider:

```
    'providers' => array(
        ...
        'Levitated\Notifications\NotificationsServiceProvider',
    );
```

## Documentation

TODO