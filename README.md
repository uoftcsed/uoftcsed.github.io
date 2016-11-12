The base theme for this site is pixyll:
[pixyll.com](http://www.pixyll.com)

It's pretty stripped down to remove any hint of the social media features in 
the template.

### Getting Started ###

To update the page, simply clone the repository, make changes to files, and then commit and push them.
They'll immediately become visible.

It's a good idea to review your changes before pushing them back to the repository. To view a local
copy of the page, go to the directory where you have cloned the repository. Then:

```
$ gem install bundler # If you don't have bundler installed
$ bundle install      # Perform this once to set up jekyll
$ jekyll serve
```

### Adding News, People, or Projects ###

The content on most of the pages is auto-generated once an entry is created in the right content area.
To create a news item, create a file in _posts. To add a new person or project, add a file to _people
or _projects, respectively. Check out the existing files in those directories to get examples of the 
fields that are supported.

### Updating Publications ###

The publications page (pubs.md) is autogenenerated from bibtex using 
[bibtexbrowser](http://www.monperrus.net/martin/bibtexbrowser). To update 
the publications page:
```
$ cd _pubs
$ ./make_research_table.bash
```

Please check the duplicates carefully. You may wish to delete entries in 
your bib file that are duplicates of entries from another file. Also, the 
duplicate detection relies on the same tag being used for an entry, which
means that the bibliographies should start from an auto-generated source.
I downloaded my bibtex file from dblp (e.g., 
[http://dblp.uni-trier.de/pers/hb/c/Petersen:Andrew](http://dblp.uni-trier.de/pers/hb/c/Petersen:Andrew)
and then updated it. In particular, you may wish to ...

- Remove non-CSEd papers
- Add CSEd papers published in non-CS venues
- Append the numerical month to each entry tag/name. (This helps with 
ordering, as bibtexbrowser orders by year and then alphabetically by
entry tag.)
- Add a comment field. Comment field are appended to the reference, which
is useful for linking to slides or highlighting an award.
