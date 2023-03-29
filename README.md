In order to run application you need Symfony CLI:

```
curl -sS https://get.symfony.com/cli/installer | bash
export PATH="$HOME/.symfony5/bin:$PATH"
```

Then you need to clone this repository and install:

```
git clone ….
composer install
```

And start the server:

````
symfony server:start
```
````

if you get an error "call to undefined method pspell_check", do this:
```
sudo apt install aspell
sudo apt install php8.1-pspell
sudo apt install aspell-en
```