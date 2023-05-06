# simple-logger
Simple logger

The logging command is
php log.php

The abstract class could be improved by adding Interface that defines the behavior of a LogTarget
with each LogTarget subclass implements this interface to provide its specific behavior
This should adding new LogTarget types become more easy without modifying the existing code

Another way is inject the LogTarget objects into the Logger constructor instead of creating them inside the class.
Then replace the LogTarget objects with different implementations or mock objects for testing

The use of configuration file could be extended to support environment variables to provide the needed Logger settings instead of hardcoding them in the code
