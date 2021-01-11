
_sn
===

Hi. I'm a starter theme called `_sn`, based on `underscores`.

Getting Started
---------------

Copy this theme folder into your project, and rename the theme-folder to something that makes sense (eg. client or project name). Then you have to rename a bunch of stuff:

1. Search for `'sn'` (inside single quotations) to capture the text domain.
2. Search for `sn_` to capture all the function names and variables.
3. Search for `Text Domain: sn` in `style.scss`.
5. Search for `sn-` to capture prefixed handles.
4. Search for <code>sn</code> to capture the rest.

Then, update the stylesheet header in `style.scss` and setup the build with Codekit.
Rename `sn.pot` from `languages` folder to use the theme's slug.

Update `XX_THEME_VERSION` in functions.php and set yout starting version in `style.scss`.

Now you're ready to go! The next step is easy to say, but harder to do: make an awesome WordPress theme. :)

Finally, delete (or preferrably update) this readme.

Good luck!
