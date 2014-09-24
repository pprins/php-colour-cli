# php-colour-cli

Allows you to have coloured output in the commandline from PHP

### Usage
```php
<?php
// Include it manually or put in the library folder
// of your framework. For example, I use it in Laravel
require_once("colourfulcli.php");
// Debugging
Colourfulcli::debug("My text");

// Normal line
Colourfulcli::line("My text");

// a comment
Colourfulcli::comment("My text");

// an error
Colourfulcli::error("My text");

// an info line
Colourfulcli::info("My text");
```

### Contact
**http://www.keyboardninja.eu**
