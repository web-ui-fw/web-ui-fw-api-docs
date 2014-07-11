# Release process for \<version\>

1. Deploy the API docs as shown below. This assumes you have already set up LAMP with Wordpress. See [Wordpress.md](Wordpress.md). In the following instructions we will assume that Wordpress is located at http://local.xyzzy/.


    ```
$ npm install
$ # Set up config.json with the credentials for uploading to http://local.xyzzy/
$ grunt wordpress-deploy
$ wget -k --mirror -p http://local.xyzzy/
$ cd local.xyzzy/
$ # Remove files containing "?" in the filename
$ find | grep '?' | while read; do F=$( echo "$REPLY" | sed 's/\?.*$//' ); if test -f "$F"; then rm "$REPLY"; else mv "$REPLY" "$F"; fi; done
```
5. ```cp -a dist``` as ```<version>``` to the repository from which ```http://web-ui-fw.github.com/jqm/<version>``` will be produced.

    For example:
    ```
$ cp -a dist ../web-ui-fw.github.com/jqm/0.2.0
$ cd ../web-ui-fw.github.com
$ git add jqm/0.2.0
$ git commit -a -m 'Web UI Framework version 0.2.0.'
$ git push origin master
```

    This should result in the following directory structure:

    ```
http://web-ui-fw.github.com/jqm/<version>/web-ui-fw.js
http://web-ui-fw.github.com/jqm/<version>/web-ui-fw.css
etc.
```
6. git tag <version> and push.
