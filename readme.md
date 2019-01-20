# My personal website rathes.me

This is the code base for my upcoming new website at [rathes.de](https://rathes.de). Currently the website is a simple html page. The goal is to update this page and provide some more information about myself but also add some functionality like generating ebooks.

---

## Features

- This website uses [Laravel](https://laravel.com) as its framework
- to render contents, I use [`aheenam/mozhi`](https://github.com/Aheenam/mozhi) which makes Markdown files to pages
- uses [`spatie/laravel-responsecache`](https://github.com/spatie/laravel-responsecache) for caching
- for styling I use [`TailwindCSS`](https://tailwindcss.com) that is compiled with Laravel Mix. ~~Additionally I use [PurgeCSS](https://github.com/FullHuman/purgecss) to remove all unused CSS which is really useful for an optimized version of Tailwind~~ (Can't do that as contents coming from Mozhi are not recognized, still looking for a solution for this)

### Sitemap

To generate the sitemap of this website, I use [`spatie/laravel-sitemap`](https://github.com/spatie/laravel-sitemap). Using this package I set up the artisan command to generate a new sitemap and put it in `/public/sitemap.xml`. So whenever you run

```bash
php artisan sitemap:generate
```

and a new `sitemap.xml` will be generated.

To avoid that I have to run this command manually everytime I create a new article for example, I added this command to the post-deploy-commands of DeployBot.

### Estimated Reading Time

On every single post of my blog you can see the information how long it will take you to read the text. I'm using my own package [`aheenam/estimated-reading-time`](https://github.com/aheenam/estimated-reading-time) for this.

I added a custom Blade directive that uses the method of this package:

```php
<?php

Blade::directive('readingTime', function ($content) {
    return "<?php echo (new \Aheenam\EstimatedReadingTime\EstimatedReadingTime)
        ->setText($content)
        ->calculateTime();
    ?>";
});
```

## Deployment

The whole project is running on a [DigitalOcean](https://www.digitalocean.com/) droplet provisioned by [Laravel Forge](https://forge.laravel.com/).

## To-Do:

The current site as seen on [rathes.de](https://rathes.de) is kept simple, but way too simple. So there are some steps to be done to make this website worth visiting.

### Add proper `About me` information

The main reason why one visits this site is to find out more about the person behind the name "Rathes Sachchithananthan", so the visitor should find enough information about me.

- [x] This includes a proper CV that is also downloadable as a PDF. This will show my professional career working as a PHP Developer since I'm 13.

- [ ] But a visitor may also be interested in learning about my personality and my personal interests. Therefore a section should be added which provides an insight into it.

### Showcase of my current work

Last but not least, I'm going to add a section that shows my current work. I'm mainly working as a Laravel Developer and getting started with creating Open Source packages for the Laravel community. But I also do some UI and Web Design stuff, have fun with VueJs and React and I do some Requirements Engineering work, too.

The visitor should find some of my projects to get an idea of what I'm doing and I'm capable of.
