# scssphp backslash test
On Windows systems the constant `DIRECTORY_SEPARATOR` uses backslashes \\ for the directory structure.
When autogenerating scss files with @import statements, the folders inside these scss files also have backslashes.
This breaks the scssphp library.

Steps to reproduce:
- clone this repo
- run composer install inside the root folder
- run `php index.php` inside the root folder from the console.
- expected behaviour: the $scss->compile(...) call compiles the test.scss file even 
if it has backslashes as directory separators. 

```php 
Fatal error:  Uncaught ScssPhp\ScssPhp\Exception\CompilerException: `componentsh1.scss` file not found for @import: test.scss on line 1, at column 0
Call Stack:
#0 import test.scss (unknown file) on line 1 in \vendor\scssphp\scssphp\src\Compiler.php:5081
Stack trace:
#0 \vendor\scssphp\scssphp\src\Compiler.php(4977): ScssPhp\ScssPhp\Compiler->error('`componentsh1.s...')
#1 \vendor\scssphp\scssphp\src\Compiler.php(2308): ScssPhp\ScssPhp\Compiler->findImport('componentsh1.sc...')
#2 \vendor\scssphp\scssphp\src\Compiler.php(2517): ScssPhp\ScssPhp\Compiler->compileImport(Array, Object(ScssPhp\ScssPhp\Formatter\OutputBlock))
#3 \vendor\scssphp\scssphp\src\Compiler.php(1987): ScssPhp\ScssPhp\Compiler->compileChild(Array, Object(ScssPhp\ScssPhp\Formatter\OutputBlock))
#4 \vendor\scssphp\scssphp\src\Compiler.php(4911): ScssPhp\ScssPhp\Compiler->compileCh in \vendor\scssphp\scssphp\src\Compiler.php on line 5081
```