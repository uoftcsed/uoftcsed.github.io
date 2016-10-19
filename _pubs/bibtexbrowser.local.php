<?php
@define('BIBTEXBROWSER_BIBTEX_LINKS',false);

function ACMBibliographyStyle(&$bibentry) {
  # Adapted from Janos
  $title = $bibentry->getTitle();
  $type = $bibentry->getType();

  $entry=array();

  // author
  if ($bibentry->hasField('author')) {
    $entry[] = $bibentry->getFormattedAuthorsString().". ";
  }

  // title
  if (substr($title, -1) != "." && substr($title, -1) != "?") {
    $title = '"'.$title.'." ';
  }
  else {
    $title = '"'.$title.'" ';
  }
  if ($bibentry->hasField('url')) $title = ' <a'.get_target().' href="'.$bibentry->getField('url').'">'.$title.'</a>';
  $entry[] = $title;


  // now the origin of the publication is in italic
  $booktitle = '';
  if (($type=="misc") && $bibentry->hasField("note")) {
    $booktitle = $bibentry->getField("note")." ";
  }

  if ($type=="inproceedings" && $bibentry->hasField(BOOKTITLE)) {
      $booktitle = $bibentry->getField(BOOKTITLE)." ";
  }

  if ($type=="incollection" && $bibentry->hasField(BOOKTITLE)) {
      $booktitle = 'Chapter in '.$bibentry->getField(BOOKTITLE)." ";
  }

  if ($type=="article" && $bibentry->hasField("journal")) {
      $booktitle = $bibentry->getField("journal")." ";
  }


  //// ******* EDITOR
  $editor='';
  if ($bibentry->hasField(EDITOR)) {
    $editor = $bibentry->getFormattedEditors();
  }

  if ($booktitle!='') {
    if ($editor!='') $booktitle .=' ('.$editor.')';
    $entry[] = '<i>'.$booktitle.'</i>';
  }


  $publisher='';
  if ($type=="phdthesis") {
      $publisher = 'PhD thesis, '.$bibentry->getField(SCHOOL);
  }

  if ($type=="mastersthesis") {
      $publisher = 'Master\'s thesis, '.$bibentry->getField(SCHOOL);
  }
  if ($type=="techreport") {
      $publisher = 'Technical report';
      if ($bibentry->hasField("number")) {
        $publisher = $bibentry->getField("number");
      }
      $publisher .=', '.$bibentry->getField("institution");
  }
  #if ($bibentry->hasField("publisher")) {
  #  $publisher = $bibentry->getField("publisher");
  #}

  if ($publisher!='') $entry[] = $publisher;

  if ($bibentry->hasField('volume')) $entry[] =  'vol. '.$bibentry->getField("volume").' ';
  if ($bibentry->hasField('number')) $entry[] =  'no. '.$bibentry->getField("number").' ';

  if ($bibentry->hasField(YEAR)) $entry[] = "(".$bibentry->getYear().")";

  if ($bibentry->hasField('pages')) $entry[] = str_replace("--", "-", ": ".$bibentry->getField("pages"));

  $result = implode("",$entry).'.';

  // some comments (e.g. acceptance rate)?
  if ($bibentry->hasField('comment')) {
      $result .=  "\n".$bibentry->getField("comment");
  }

  // add the Coin URL
  $result .=  "\n".$bibentry->toCoins();

  return $result;
}
@define('BIBLIOGRAPHYSTYLE','ACMBibliographyStyle');
?>
