# Release process for \<version\> API docs

0. Deploy the API docs as shown below. This assumes you have already set up LAMP with Wordpress. See [Wordpress.md](Wordpress.md). In the following instructions we will assume that Wordpress is located at http://local.xyzzy/.


    ```
$ npm install
$ # Set up config.json with the credentials for uploading to http://local.xyzzy/
$ grunt wordpress-deploy
$ wget -k --mirror -p http://local.xyzzy/
$ # Remove files containing "?" in the filename
$ find local.xyzzy | grep '?' | while read; do F=$( echo "$REPLY" | sed 's/\?.*$//' ); if test -f "$F"; then rm "$REPLY"; else mv "$REPLY" "$F"; fi; done
```
0. ```cp -a local.xyzzy <web-ui-fw repo>/dist/api-docs```

    For example:
    ```
$ cp -a local.xyzzy ../web-ui-fw/dist
```

0. Continue web-ui-fw release process.

6. Just before pushing the final dist/ directory to web-ui-fw.github.io, git tag <version> and push.
