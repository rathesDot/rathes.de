**WIP This repository is still not finished**

---

My personal website rathes.de
===

This is the code base for my upcoming new website at [rathes.de](https://rathes.de). Currently the website is a simple html page. The goal is to update this page and provide some more information about myself but also add some functionality like generating ebooks.

---

Features
---

- This website uses [Laravel](https://laravel.com) as its framework
- to render contents, I use [`aheenam/mozhi`](https://github.com/Aheenam/mozhi) which makes Markdown files to pages
- uses [`spatie/laravel-responsecache`](https://github.com/spatie/laravel-responsecache) for caching
- for styling I use [`TailwindCSS`](https://tailwindcss.com) that is compiled with Laravel Mix. ~~Additionally I use [PurgeCSS](https://github.com/FullHuman/purgecss) to remove all unused CSS which is really useful for an optimized version of Tailwind~~ (Can't do that as contents coming from Mozhi are not recognized, still looking for a solution for this)

Deployment
---

Currently the site is still hosted on the shared hosting service [ALL-INKL](https://all-inkl.com/?partner=374001) and deployed using [DeployBot](https://deploybot.com). By time I'm going to move the whole project to [DigitalOcean](https://www.digitalocean.com/) provisioned by [Laravel Forge](https://forge.laravel.com/).

To-Do:
---

The current site as seen on [rathes.de](https://rathes.de) is kept simple, but way too simple. So there are some steps to be done to make this website worth visiting.

### Add proper `About me` information

The main reason why one visits this site is to find out more about the person behind the name "Rathes Sachchithananthan", so the visitor should find enough information about me.

This includes a proper CV that is also downloadable as a PDF. This will show my professional career working as a PHP Developer since I'm 13. But a visitor may also be interested in learning about my personality and my personal interests. Therefore a section should be added which provides an insight into it.

### *(done)* Move my writings from `web-und-die-welt.de` to a blog section

Currently I'm writing a blog at [web-und-die-welt.de](https://web-und-die-welt.de) on a unregular basis. This blog is completely in German. As the initial idea of this blog has been discarded, I'm going to move the most important articles of the blog to this site. Additionally I'm going to write in English as well.

### Showcase of my current work

Last but not least, I'm going to add a section that shows my current work. I'm mainly working as a Laravel Developer and getting started with creating Open Source packages for the Laravel community. But I also do some UI and Web Design stuff, have fun with VueJs and React and I do some Requirements Engineering work, too.

The visitor should find some of my projects to get an idea of what I'm doing and I'm capable of.

---

*More information will be added as soon as the implementation is done*