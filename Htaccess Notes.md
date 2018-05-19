- DENY TO .htaccess FILE ITSELF

<FilesMatch "^\.ht">
        Require all denied
</FilesMatch>


deny directories

public/config denied, not public/config/db.php


deny specific directory

deny this; public_html/src/config
not this;  public_html/src

RewriteCond %{REQUEST_URI} ^/public_html/src/config [NC]
RewriteRule .* - [F,L]


deny specific file in all directories

this; config/src/db.php & config/db.php etc.

<Files "db.php">
Order Allow,Deny
Deny from all
</Files>
