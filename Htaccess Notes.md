- DENY TO .htaccess FILE ITSELF

<FilesMatch "^\.ht">
        Require all denied
</FilesMatch>



- DENY DIRECTORIES (public/config denied, not public/config/db.php)

Options -Indexes


- DENY SPECIFIC DIRECTORY (deny this; public_html/src/config, not this;  public_html/src)

RewriteCond %{REQUEST_URI} ^/public_html/src/config [NC]
RewriteRule .* - [F,L]

- DENY SPECIFIC FILE IN ALL DIRECTORIES

this; config/src/db.php & config/db.php etc.

<Files "db.php">
Order Allow,Deny
Deny from all
</Files>
