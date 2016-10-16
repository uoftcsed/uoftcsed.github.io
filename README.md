The base theme for this site is pixyll:
[pixyll.com](http://www.pixyll.com)

It's pretty stripped down to remove any hint of the social media features in 
the template.

To get started, after cloning our repo:
```
$ gem install bundler # If you don't have bundler installed
$ bundle install
$ jekyll serve --watch # So the page will update live as you make changes
```

The publications page (pubs.md) is autogenenerated from bibtex using 
[bibtexbrowser](http://www.monperrus.net/martin/bibtexbrowser). To update 
the publications page:
```
$ cd _pubs
$ ./make_research_table.bash
```

Please check the duplicates carefully. You may wish to delete entries in 
your bib file that are duplicates of entries from anotehr file. Also, the 
duplicate detection relies on the same tag being used for an entry, which
means that the bibliographies should start from an auto-generated source.
I downloaded my bibtex file from dblp (e.g., 
[http://dblp.uni-trier.de/pers/tb2/p/Petersen:Andrew.bib](http://dblp.uni-trier.de/pers/tb2/p/Petersen:Andrew.bib))
and then updated it. In particular, you may wish to ...

- Remove non-CSEd papers
- Add CSEd papers published in non-CS venues
- Append the numerical month to each entry tag/name. (This helps with 
ordering, as bibtexbrowser orders by year and then alphabetically by
entry tag.)
- Add a comment field. Comment field are appended to the reference, which
is useful for linking to slides or highlighting an award.

