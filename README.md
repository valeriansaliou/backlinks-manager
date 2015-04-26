# BackLinks Manager

Welcome to the Backlinks manager PHP function documentation!

# How to install it?

First, you need to get the package on the download page and then unzip it.

Once done, open the backlinks-manager.function.php file and include it to your PHP website. Then, open the backlinks-manager.call.php file and copy the example to apply it to your own website's code.

Add your Backlinks codes in the two arrays (choose the good one between standard and content Backlinks or use both). Each code must have an unique page ID (generally the page name) to be called in the website.

Make sure that you have an ./ads/ folder and that it is writable by the server (777 rights in most cases).

# How to call it?

Calling your backlinks on a page is that simple:

```php
<?php echo getBacklinks('PAGE_ID (page_1)', 'BACKLINKS_TYPE (standard/content)'); ?>
```

Have a look to the backlinks-manager.call.php file, which is a working example.

# Q & A

## Does it work with the Backlinks.com validation system?

Absolutely. The cache is refreshed each time the Backlinks.com bot goes on your website, so that the new ads appear and it will not break anything.
