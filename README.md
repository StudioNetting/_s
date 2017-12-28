netting, from _s :)
===

If you want to keep it simple, head over to https://underscores.me and generate your `_s` based theme from there.

If you want to set things up manually then you'll need to do a five-step find and replace on the name in all the templates.

1. Search for `'_s'` (inside single quotations) to capture the text domain.
2. Search for `_s_` to capture all the function names.
3. Search for `Text Domain: _s` in `style.css`.
4. Search for <code>&nbsp;_s</code> (with a space before it) to capture DocBlocks.
5. Search for `_s-` to capture prefixed handles.

OR

1. Search for: `'_s'` and replace with: `'netting'`
2. Search for: `_s_` and replace with: `netting_`
3. Search for: `Text Domain: _s` and replace with: `Text Domain: netting` in `style.css`.
4. Search for: <code>&nbsp;_s</code> and replace with: <code>&nbsp;netting</code>
5. Search for: `_s-` and replace with: `netting-`

Then, update the stylesheet header in `style.css` and rename `_s.pot` from `languages` folder to use the theme's slug.

Now you're ready to go! The next step is easy to say, but harder to do: make an awesome WordPress theme. :)

May the netting force be with you.
