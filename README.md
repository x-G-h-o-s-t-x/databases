# databases
####mysqli &amp; pdo oop classes to use with php

mysqli oop db class usage examples:
```php
// multi row table
$categories = db::mysqli()->query('SELECT * FROM `categories`');
if($categories->count() > 0):
    foreach($categories->result() as $category):
        echo $category->title, '<br/>';
    endforeach;
endif;

db::mysqli()->query('UPDATE `config` SET `site_name`="codemafia"');

// single row table
$query = db::mysqli()->query('SELECT * FROM `config`');
// then use our result function as an array instead:
$config = $query->result()[0];
echo '<br/>', $config->site_name;
```

pdo oop db class usage examples:
```php
// multi row table
db::pdo()->query('SELECT * FROM `categories`');
// or with bind
//db::pdo()->query('SELECT * FROM `categories` WHERE `id`=:id');
//db::pdo()->bind(':id', '1');
db::pdo()->execute();
if(db::pdo()->count() > 0):
    foreach(db::pdo()->result() as $category):
        echo $category->title, '<br/>';
    endforeach;
endif;

db::pdo()->query('UPDATE `config` SET `site_name`="codemafia"');
db::pdo()->execute();

// single row table
db::pdo()->query('SELECT * FROM `config`');
db::pdo()->execute();
// then use our result function as an array instead:
$config = db::pdo()->result()[0];
echo '<br/>', $config->site_name, '<br/><br/>';
```
