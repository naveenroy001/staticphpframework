## Static PHP Framework
Small Static PHP framework for your small needs


## Installation

`git clone https://github.com/naveenroy001/staticphpframework.git`


## Create Pages 

Goto `pages` folder create your pages here

`session` and `database` is already connected just use here directly.


## Create Routes 
Goto `system/route` file write your routes here

````
$route['/'] = "home";  // here home is by default path for pages/home.php
$route['aboutus'] = "about"; // here about is by default path for `pages/about.php`

````

For use `Post method` 

````
$route['someaction:POST'] = "actions/someaction";  
//here actions/someaction is by default path for pages/actions/someaction.php

````

## Helpers

For use root url use `<?= base_url; ?>`

also you can edit or add globle variable by edit on `system/core.php`

````
define('base_url', $actual_link);				//url using
define('css_url', base_url . '/assets/css');
define('js_url', base_url . '/assets/js');
define('img_url', base_url . '/assets/img');
````

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)


## Author
[Naveen Roy](https://github.com/naveenroy001)

