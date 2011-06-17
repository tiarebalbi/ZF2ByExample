Generated Service Locator
=========================

This example is intended to show off two features:

* Creating a ServiceLocator from a configured DI container
* Using said ServiceLocator

The class in `GeneratedServiceLocator.php` can be re-created by running
`create-container.php`. This runs the code in "development" mode, which
compiles the DI definition on-the-fly using the "Compiler" definition, and then
passes it to a ServiceLocator Generator.

`__main__.php` then runs in production mode and uses the generated service
locator.

